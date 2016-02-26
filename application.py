# -*- coding: utf-8 -*-

from applib import dbStore
from flask import Flask, render_template, request
app = Flask(__name__)


@app.route('/')
def hello_world(name=None):
    return render_template('Index.html', name=name)


@app.route('/accounting')
def accounting(num=10):
    return render_template('Accounting.html', DBresult=dbStore.query_sql(num))

if __name__ == '__main__':
    app.run()
