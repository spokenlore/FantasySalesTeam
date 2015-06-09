import json

def main():
	JSON = []
	with open("Players_roster_june 8 UPDATED.txt") as readfile:
		eof = 1
		while eof:
			line = readfile.readline()
			if line is '':
				eof = 0
				break
			line = line.split("\t")
			FIRSTNAME = line[0]
			LASTNAME = line[1]
			EMAIL = line[2]
			GROUP = line[3]
			lineJSON = {"FIRSTNAME" : FIRSTNAME, "LASTNAME" : LASTNAME, "EMAIL" : EMAIL, "GROUP" : GROUP}
			JSON.append(lineJSON)
	with open("roster.json", 'w+') as writefile:
		writefile.write(str(json.dumps(JSON)))

main()