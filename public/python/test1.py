import sqlite3
import pandas as pd
import sys
import json

conn = sqlite3.connect('..\database\match.sqlite')

user_id = str(sys.argv[1])
filters = json.loads(sys.argv[2])
gender = str(filters[0])
age = str(filters[1])
location = str(filters[2])
religion = str(filters[3])
height = str(filters[4])
r_status = str(filters[5])
m_status = str(filters[6])
need = str(filters[7])
school = str(filters[8])
course = str(filters[9])
level = str(filters[10])
degree = str(filters[11])

def create_query(gender,age,location,religion,height,r_status,m_status,school,course,level):
	if(school == 0):
		query = "Select * from users join profiles ON users.id = (profiles.user_id Where users.gender = " + gender
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
			query+= " and profiles.m_status = " + m_status
	if(need != "0"):
			query+= " and profiles.need = " + need
	if(school != "0"):
			query+= " and profiles.school = " + school
			if(course != "0"):
					query+= " and students.course = " + course
			if(level != "0"):
				query+= " and students.level = " + level
			if(level != "0"):
				query+= " and students.degree = " + degree
	return query




query = create_query(gender,age,location,religion,height,r_status,m_status,school,course,level)

df = pd.read_sql_query(query,conn)

print(df.info())