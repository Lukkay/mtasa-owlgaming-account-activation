function checkPassword(id, password)
    local qb = dbQuery(exports.mysql:getConn("mta"), "SELECT * FROM accounts WHERE id=?", id)
    local result = dbPoll(qb, -1)

    if result and #result > 0 then
        local accountData = result[1]
        local encryptedPW = bcrypt_checkpw(sha256(password):lower(), accountData["password"]:gsub("bcrypt_sha256%$", ""))

        if encryptedPW then
            return true
        else
            return false
        end
	else 
		return false
    end
end

function getAccountID(serial)
	local qb = dbQuery(exports.mysql:getConn("mta"), "SELECT * FROM account_details WHERE mtaserial=?", serial)
    local result = dbPoll(qb, -1)

	if result and #result > 0 then
		local accountData = result[1]
		local id = accountData["account_id"]
		
		return id
	else
		return false
	end
end

function verifyAccount(serial, password, password2)
 
	if not serial or serial == "" then
		return false, "Zadej platný MTA serial."
	end

	if not password or password == "" then
		return false, "Zadej platné heslo #1."
	end

	if not password2 or password2 == "" then
		return false, "Zadej platné heslo #2."
	end

	if not (password == password2) then
		return false, "Hesla se neshodují."
	end


	local id = getAccountID(serial)
	if id then
		local passwordCheck = checkPassword(id, password)
		if passwordCheck then
			local qb = dbQuery(exports.mysql:getConn("mta"), "SELECT * FROM accounts WHERE id=?", id)
			local result = dbPoll(qb, -1)
			if result and #result > 0 then
				local accountData = result[1]
				if accountData["activated"] == 0 then
					dbExec(exports.mysql:getConn("core"), "UPDATE accounts SET activated=1 WHERE id=?", id)
					return true, "Účet byl úspěšně aktivován, můžeš se připojit!"
				else
					return false, "Účet je již aktivován."
				end
			else
				return false, "Účet neexistuje."
			end
		else
			return false, "Heslo není správné."
		end
	else
		return false, "Účet neexistuje." 
	end
end