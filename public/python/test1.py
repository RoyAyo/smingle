import sqlite3
import pandas as pd
import sys
import json

conn = sqlite3.connect('..\..\database\match.sqlite')

user_id = str(sys.argv[1])
filters = json.loads(sys.argv[2])
gender = str(sys.argv[0])
age = str(sys.argv[1])
location = str(sys.argv[2])
religion = str(sys.argv[3])
height = str(sys.argv[4])
r_status = str(sys.argv[5])
m_status = str(sys.argv[6])
need = str(sys.argv[7])
student = str(sys.argv[8])
school = str(sys.argv[9])
course = str(sys.argv[10])
level = str(sys.argv[11])
based_on ="generals"

def create_query(gender,age,location,religion,height,r_status,m_status,student,school,course,level):
	query = "Select users.* from users join profiles on users.id = profiles.user_id where users.gender != " + gender
	if(age != "0"):
			query+= " and profiles.age = " + age
	if(location != "0"):
			query+= " and profiles.location = " + location
	if(religion != "0"):
			query+= " and profiles.religion = " + religion
	if(height != "0"):
			query+= " and profiles.height = " + height
	if(r_status != "0"):
			query+= " and profiles.r_status = " + r_status
	if(m_status != "0"):
			query+= " and profiles.m_status >= " + m_status
	if(need != "0"):
			query+= " and profiles.need = " + need
	if(student != "0"):
			query+=" and profiles.student = " + student
			if (school != "0"):
				query+= " and profiles.school = " + school
			if(course != "0"):
					query+= " and students.course = " + course
			if(level != "0"):
				query+= " and students.level = " + level
	return query

query1 = create_query(gender,age,location,religion,height,r_status,m_status,student,school,course,level)

#query = "Select u.name,u.gender,u.cluster,u.DOB," + based_on + ".* from " + based_on + " join () as u On u.id = " + based_on + ".user_id"
query = "Select u.name,u.gender,u.cluster,u.DOB," + based_on + ".* from " + based_on + " join (" + query1 + ") as u On u.id = " + based_on + ".user_id"


df = pd.read_sql_query(query,conn)
#print(df[['name','id','user_id']])
print(df.head())
print(df.info())