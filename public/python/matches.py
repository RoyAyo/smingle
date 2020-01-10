import pandas as pd
import sys
import sqlite3
import json
import math
import random


user_id = int(sys.argv[1])
based_on = sys.argv[2]
gender = sys.argv[3]
age = sys.argv[4]
location = sys.argv[5]
religion = sys.argv[6]
height = sys.argv[7]
r_status = sys.argv[8]
m_status = sys.argv[9]
need = sys.argv[10]
student = sys.argv[11]
school = sys.argv[12]
course = sys.argv[13]
level = sys.argv[14]


conn = sqlite3.connect('../database/match.sqlite')

def create_query(gender,age,location,religion,height,r_status,m_status,student,school,course,level):
	query = "Select users.* from users join profiles on users.id = profiles.user_id where users.id = "+ str(user_id) + " or users.gender != " + gender
	if(age != "0"):
			query+= " and profiles.age = " + age
	if(location != "0"):
			query+= " and profiles.location = '" + location + "'"
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
	if(student != "2"):
			query+=" and profiles.student = " + student
			if (school != "0"):
				query+= " and profiles.school = '" + school + "'"
			if(course != "0"):
					query+= " and profiles.course = '" + course + "'"
			if(level != "0"):
				query+= " and profiles.level = " + level
	return query

def mse(a2):
	error = 0.0
	for i in range(0,15):
		err = abs(a1[i] - a2[i])
		e = math.pow(err,2)
		error += e
	error = math.sqrt(error)
	tot_err = math.sqrt(135)

	if (error > tot_err):
		corr = 0.2
	else:
		corr = (abs(tot_err - error) / tot_err)	
	return corr

def clus(c):
	cluster_diff = abs(user_cluster - c)
	if cluster_diff > 0:
		cluster_diff = 0.1
	return cluster_diff

def bday_match(bd):
	month1 = user_bday.split('-')[1]
	day1 = user_bday.split('-')[2]
	month2 = bd.split('-')[1]
	day2 = bd.split('-')[2]
	if (user_bday == bd):
		return 0.15
	else:
		if (month1 == month2) & (abs(int(day1) - int(day2)) < 5):
			return 0.10
		else:
			return 0.0
#connections and all
query1 = create_query(gender,age,location,religion,height,r_status,m_status,student,school,course,level)

query = "Select u.cluster,u.DOB," + based_on + ".* from " + based_on + " join (" + query1 + ") as u On u.id = " + based_on + ".user_id"

df = pd.read_sql_query(query,conn)

if len(df) == 0:
	print(json.dumps(0))
else:
	df.set_index('user_id',inplace=True)
	df.drop(['id','created_at','updated_at'],axis=1,inplace=True)

	a = df.loc[user_id].values
	user_cluster = a[0]
	user_bday = a[1]
	a1 = a[2:]

	df_search = df.drop(user_id)
	if len(df_search) == 0:
		print(json.dumps(0))
	else:
		#you must pass the first critereria stage

		df_search['mse'] = df_search.drop(['cluster',"DOB"],axis=1).apply(mse,axis=1)

		df_search['cluster'] = df['cluster'].apply(clus)

		df_search['bday_match'] = df_search['DOB'].apply(bday_match)

		ml_error_rate = 0.02

		df_search['match'] = ((df_search['mse'] - df_search['cluster']) + df_search['bday_match']) - ml_error_rate  

		df_top = df_search['match'].nlargest(1)

		r = random.randint(0,len(df_top)-1)

		i = df_top.index[r]

		best = {}
		best["id"] = int(i)
		best["match"] = df_top.loc[i]

		print(json.dumps(best))