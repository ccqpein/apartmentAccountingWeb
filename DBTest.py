from applib import dbStore

if __name__ == "__main__":
    rr = dbStore.query_sql()

#    rr = dbStore.do_sql(rr)
    print(list(rr))

    rr = dbStore.query_sql(1)
    print(list(rr))

#    dbStore.add_sql(3, "exciting", 123)
