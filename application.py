# -*- coding=utf-8 -*-

import applib.dbStore as _db
import applib.accountingForm as _ac
from flask import Flask, render_template, redirect, url_for, g
from flask.ext.bootstrap import Bootstrap
import sqlite3

dataDir = _db.dataDir


def connect_db():
    return sqlite3.connect(dataDir)


app = Flask(__name__)
app.config['SECRET_KEY'] = "nicaicai"
bootstrap = Bootstrap(app)


@app.before_request
def before_request():
    g.db = connect_db()


def do_sql(strr):
    with g.db:
        cur = g.db.execute(strr)
    return cur


@app.route('/')
def index():
    return render_template('Index.html')


@app.route('/accounting', methods=["GET", "POST"])
@app.route('/accounting/<num>', methods=["GET", "POST"])
def accounting(num=10):
    #    num = 10
    form = _ac.SubmitRecordForm()
    query_form = _ac.QueryRecordForm()
    DBresult = list(do_sql(_db.query_sql(num)))

    if form.validate_on_submit():
        newName = form.name.data
        newPrice = form.price.data
        newid = list(
            do_sql("""select count(*) from accountingList;"""))[0][0] + 1
        do_sql(_db.add_sql(newid, newName, newPrice))

        form.name.data, form.price.data = "", ""
#        print("fuck")
        return redirect(url_for("accounting"))

    if query_form.validate_on_submit():
        showNum = list(
            do_sql("""select count(*) from accountingList;"""))[0][0]
#        print(showNum)
        return redirect(url_for("accounting", num=showNum))

#    print(list(DBresult))
    return render_template('Accounting.html',
                           form=form,
                           query_form=query_form,
                           DBresult=DBresult)


@app.teardown_request
def teardown_request(exception):
    if hasattr(g, "db"):
        g.db.close()

if __name__ == '__main__':
    app.debug = True
    app.run(port=2525)
