import pandas as pd
import sys
import sqlite3
import json
import math

zodiac = {'Aquarius':["Aries","Gemini","Taurus"],'Taurus':["Capricorn","Cancer","Leo"],'Gemini':["Aquarius","Libra","Virgo"],'Cancer':["Taurus","Pisces","Capricorn"],'Libra':["Gemini","Leo","Pisces"],'Scorpio':["Pisces","Aquarius","Gemini"],'Saggittarius':["Leo","Aries","Virgo"],'Capricorn':["Taurus","Virgo","Libra"],'Pisces':["Cancer","Scorpio","Gemini"],'Leo':["Aquarius","Saggittarius","Taurus"],'Virgo':["Cancer","Capricorn","Gemini"],'Aries':["Aquarius","Saggittarius","Cancer"]}

def mse(a1,a2):
	error = 0.0
	for i in range(0,15):
		err = abs(a1[i] - a2[i])
		e = math.pow(err,2)
		error += e
	return error

conn = sqlite3.connect('../database/match.sqlite')

#males
user_males1 = sys.argv[1]
user_males2 = sys.argv[2]
user_males3 = sys.argv[3]
user_males4 = sys.argv[4]
user_males5 = sys.argv[5]

#females
user_females1 = sys.argv[6]
user_females2 = sys.argv[7]
user_females3 = sys.argv[8]
user_females4 = sys.argv[9]
user_females5 = sys.argv[10]

#data structure for saving best matches
matches = {}

matches{user_males1}