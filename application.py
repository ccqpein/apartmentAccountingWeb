# -*- coding: utf-8 -*-

from applib import dbStore
from flask import Flask, render_template, request
app = Flask(__name__)


@app.route('/')
def hello_world(name=None):
    return render_template('Index.html', name=name)


@app.route('/accounting')
def accounting():
    return render_template('Accounting.html', listtest=["ccQ", "handsome"])

if __name__ == '__main__':
    app.run()
