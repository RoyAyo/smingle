import pandas as pd
import sys
import sqlite3
import json
import math

#the zoidac sign compatibility
#a dict as a data structure
zodiac = {'Aquarius':["Aries","Gemini","Taurus"],'Taurus':["Capricorn","Cancer","Leo"],'Gemini':["Aquarius","Libra","Virgo"],'Cancer':["Taurus","Pisces","Capricorn"],'Libra':["Gemini","Leo","Pisces"],'Scorpio':["Pisces","Aquarius","Gemini"],'Saggittarius':["Leo","Aries","Virgo"],'Capricorn':["Taurus","Virgo","Libra"],'Pisces':["Cancer","Scorpio","Gemini"],'Leo':["Aquarius","Saggittarius","Taurus"],'Virgo':["Cancer","Capricorn","Gemini"],'Aries':["Aquarius","Saggittarius","Cancer"]}

def mse(a1,a2):
	error = 0.0
	for i in range(0,15):
		err = abs(a1[i] - a2[i])
		e = math.pow(err,2)
		if e == 1:
			e *= 2
		error += e
	return error

conn = sqlite3.connect('../database/match.sqlite')

user_id1 = sys.argv[1]
user_id2 = sys.argv[2]
based_on = sys.argv[3]

ids = str([user_id1,user_id2])

query = "Select users.cluster,users.zodiac,users.DOB," + based_on + ".* from users join " + based_on + " On users.id = " + based_on + ".user_id where user_id = " + user_id1 + " or user_id = " + user_id2

df = pd.read_sql_query(query,conn)

df.set_index('user_id',inplace=True)
zodiacs = df.zodiac
cluster = df.cluster
dob = df.DOB
df.drop(['id','created_at','updated_at',"zodiac","cluster","DOB"],axis=1,inplace=True)

#how similar answers are
error = mse(df.loc[int(user_id1)].values,df.loc[int(user_id2)].values)


tot_err = 105

if (error > tot_err):
	corr = 0.15
else:
	corr = (abs(tot_err - error) / tot_err)


cluster_diff = abs(cluster.loc[int(user_id1)] - cluster.loc[int(user_id2)])
	
if cluster_diff > 0:
	cluster_diff = 0.035

dob1 = dob.loc[int(user_id1)]
month1 = dob1.split('-')[1]
day1 = dob1.split('-')[2]
dob2 = dob.loc[int(user_id2)]
month2 = dob2.split('-')[1]
day2 = dob2.split('-')[2]

z1 = zodiacs.loc[int(user_id1)]
z2 = zodiacs.loc[int(user_id2)]
zs = zodiac[z1]

if (dob1 == dob2):
	zod = 0.175
else:
	if (month1 == month2) & (abs(int(day1) - int(day2)) < 4):
		zod = 0.125
	else:
		if(z2 in zs):
			i = zs.index(z2)
			if i > 1:
				zod = -0.05
			else:
				zod = 0.1
		else:
			zod = 0

m = (corr - cluster_diff) + zod

ml_error_rate = 0.01

m -= ml_error_rate

if m >= 1.0:
	print(0.98)
else:
	print(m)