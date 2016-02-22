# -*- coding: utf-8 -*-

from flask import Flask
from flask import render_template
app = Flask(__name__)


@app.route('/')
def hello_world(name=None):
    return render_template('Index.html', name=name)


@app.route('/accounting')
def accounting():
    return "accounting"

if __name__ == '__main__':
    app.run()
