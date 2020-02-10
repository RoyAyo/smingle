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

def comment(g,c1,c2,score,broke,g1,g2,g3,g4,g5,g6):
	if g == '1':
		gd = 'He'
		gd2 = 'Him'
		gd3 = 'reverend'
	else:
		gd = 'She'
		gd2 = 'Her'
		gd3 = 'nun'
	if c1 == 4:
		if c2 == 1:
			if g1[1] < 3:
				return gd + " can't comprehend what you are going through"
			else:
				if (abs(g3[0] - g3[1]) > 2):
					return "Really different priorities"
				elif score > 0.7:
					return gd + "will be good enough or even very good for you."
				elif score > 0.45:
					return "You two are really different people, you can try to see how it goes"
				elif score < 0.3:
					return "Look elsewhere"
				else:
					return gd + "will be manageable for starters"
		elif c2 == 4:
			if g1[1] < 3:
				if g1[0] < 3:
					return "Toxic Relationship"
				else:
					return "You will have to try hard to make it work"
			else:
				if g3[0] == 1:
					if (abs(g3[0] - g3[1]) > 2):
						return "Religion might be a barrier"
					else:
						return "No comment"
				elif score > 0.64:
					return gd + "seems perfect"
				elif score > 0.45:
					return "Can't really say"
				else:
					return "Bad match for you"
		else :
			if score > 0.8:
				return gd + " is Perfect for you"
			elif score > 0.65:
				return "Very good match"
			elif score > 0.5:
				if c2 == 3:
					return gd + " will be a very good and understanding friend"
				return " will be good for you."
			elif score < 0.2:
				return "Stay Faraway, make you stay faraway"
			else:
				return " Ah!!! No comment "
	else:
		if (g4[0] == 1 and broke == 1):
			if score < 0.55:
				return "Stay Faraway..Not for you Moneywise"
		if (abs(g2[0] - g2[1]) > 2):
			if score > 0.8:
				if g2[0] == 1:
					return "Very good for you but "+ gd +" wants something you might not be able to offer"
				elif g2[0] == 1:
					return "Very good for you but you cannot offer what" + gd + "want"
			elif score > 0.5:
				if g2[0] == 1:
					return "Manageable but there will be obvious loopholes"
				elif g2[0] == 1:
					return "You have to accept you can't get all you need from" + gd2
		if (abs(g4[0] - g4[1]) > 2):
			if g2[1] == 4:
				if score > 0.63:
					return gd + " will most probably cheat on you at the end but a good relationship"
				else :
					return "It will end in tears"
		if ((g1[0] == 3 or g1[0] == 2) and (g1[1] == 3 or g1[1] == 2)):
			if score < 0.47:
				return "Dramatic Relationship"
		if (g6[0] == 4 or g6[1] == 1):
			if (abs(g6[0] - g6[1]) > 1):
				if g6[0] == 4:
					return "You might start well but lose interest"
				else:
					if score <= 0.25:
						return "You will be better a " + gd3
					elif score < 0.5:
						return "Not the right amount of fun/too boring for you"
		if score > 0.82:
			return "Probably the best person you could find out there"
		elif score > 0.6:
			return "Really good relationship compatibility"
		elif score > 0.5:
			return "Good friend Material"
		elif score > 0.3:
			return "Even with low compatibility you might have no issues"
		else:
			return "Ha ha ha!!! Why are you even checking this?"

conn = sqlite3.connect('../database/match.sqlite')

user_id1 = sys.argv[1]
user_id2 = sys.argv[2]
based_on = sys.argv[3]
gender = sys.argv[4]
broke = sys.argv[5]


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

ans1 = df.loc[int(user_id1)].values
ans2 = df.loc[int(user_id2)].values

tot_err = 90

if (error > 75):
	if error >= 120:
		corr = 0.02
	elif error >= 100:
		corr = 0.07
	else:
		corr = 0.11
else:
	corr = (abs(tot_err - error) / tot_err)


cluster_diff = abs(cluster.loc[int(user_id1)] - cluster.loc[int(user_id2)])
	
if cluster_diff == 1:
	cluster_diff = 0.07
elif cluster_diff == 2:
	cluster_diff = 0.13
elif cluster_diff == 3:
	cluster_diff = 0.18
else:
	cluster_diff = 0

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
		zod = 0.10
	else:
		if(z2 in zs):
			i = zs.index(z2)
			if i > 1:
				zod = -0.05
			else:
				zod = 0.07
		else:
			zod = 0

m = (corr - cluster_diff) + zod

ml_error_rate = 0.02

m += ml_error_rate

d = {}

c = comment(gender,cluster.loc[int(user_id1)],cluster.loc[int(user_id2)],m,broke,[ans1[0],ans2[0]],[ans1[2],ans2[2]],[ans1[3],ans2[3]],[ans1[5],ans2[5]],[ans1[7],ans2[7]],[ans1[10],ans2[10]])

if m >= 0.98:
	m = 0.970
elif m <= 0:
	m = 0.015

d['score'] = m
d['comment'] = c
print(json.dumps(d))
