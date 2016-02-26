#! /usr/bin/env python
# -*- coding=utf-8 -*-

import sys
import os
import sqlite3
from time import localtime, strftime


if os.path.exists(sys.path[0] + "/accoutingRecords.db"):
    conn = sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
else:
    sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
    conn = sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
    with conn:
        conn.execute('''create table accountingList (stuff_id int(77) not null,
                        object_Name varchar(77) not null,
                        object_Price float(77) not null,
                        object_Date DATETIME not null,
                        primary key (stuff_id));''')


def do_sql(strr):
    with conn:
        cur = conn.execute(strr)
    return cur


def doSqlDec(fun):
    def _first(*args):
        strr = fun(*args)
        result = do_sql(strr)
        return result
    return _first


#@doSqlDec
def add_sql(*args):
    # first element is id, second is name, third is price number
    print(args)
    strr = '''insert into accountingList values("{id}", "{objectname}", "{objectprice}", "{objectDate}");'''\
           .format(id=args[0],
                   objectname=args[1],
                   objectprice=args[2],
                   objectDate=strftime("%Y-%m-%d", localtime()))
    return strr


#@doSqlDec
def query_sql(num=None):
    # query recently {num} data from db
    if num:
        strr = '''select * from accountingList limit {num};'''\
               .format(num=num)
    else:
        strr = '''select * from accountingList;'''
    return strr
