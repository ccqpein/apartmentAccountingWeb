# -*- coding=utf-8 -*-

from applib import dbStore, accountingForm
from flask import Flask, render_template, redirect, url_for, g
from flask.ext.bootstrap import Bootstrap
import sqlite3

dataDir = dbStore.dataDir


def connect_db():
    return sqlite3.connect(dataDir)


@app.before_request
def before_request():
    g.db = connect_db()

app = Flask(__name__)
app.config['SECRET_KEY'] = "nicaicai"
bootstrap = Bootstrap(app)


@app.route('/')
def index():
    return render_template('Index.html')


@app.route('/accounting', methods=["GET", "POST"])
def accounting():
    num = 10
    form = accountingForm.SubmitRecordForm()
    DBresult = []

    if form.validate_on_submit():
        newName = form.name.data
        newPrice = form.price.data
        testid = 10
        doSql(addData(testid, newName, newPrice))

        form.name.data, form.price.data = "", ""
        return redirect(url_for("accounting"))

    return render_template('Accounting.html',
                           form=form,
                           DBresult=DBresult)


@app.teardown_request
def teardown_request(exception):
    if hasattr(g, "db"):
        g.db.close()

if __name__ == '__main__':
    app.debug = True
    app.run()
