import sqlite3
from applib import dbStore

if __name__ == "__main__":
    strr = dbStore.query_sql()
    conn = sqlite3.connect(dbStore.dataDir)
    rr = dbStore.do_sql(strr, conn)

    for i in list(rr):
        print(i)
