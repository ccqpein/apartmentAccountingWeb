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
        conn.execute('''create table accountingList (object_Name char() not null,
                                                object_Price varchar(77) not null,
                                                    primary key(object_Name))
                    ''')


def do_sql(strr):
    with conn:
        cur = conn.execute(strr)
    return cur


def add_sql(name, price):
    do_sql('''insert into accountingList value ("{objectname}", "{objectprice}");'''.format(
        objectname=name, objectprice=prince))
