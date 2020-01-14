from sklearn.externals import joblib
import json
import sys
import numpy as np


model = joblib.load('../database/model.pickle')

data = json.loads(sys.argv[1])
data = np.array([data])

pred = model.predict(data)

print(pred[0])
