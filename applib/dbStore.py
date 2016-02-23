#! /usr/bin/env python
# -*- coding=utf-8 -*-

import sys
import os
import sqlite3


if os.path.exists(sys.path[0] + "/accoutingRecords.db"):
    conn = sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
else:
    sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
    conn = sqlite3.connect(sys.path[0] + '/accoutingRecords.db')
    with conn:
        conn.execute('''create table accountingList (object_Name varchar(77) not null,
                                                object_Price float(77) not null);''')


def do_sql(strr):
    with conn:
        conn.execute(strr)


def add_sql(thename, price):
    strr = '''insert into accountingList values("{objectname}", "{objectprice}");'''.format(
        objectname=thename, objectprice=price)
    do_sql(strr)

if __name__ == "__main__":
    add_sql("test", 100)
