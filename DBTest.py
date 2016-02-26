from applib import dbStore

if __name__ == "__main__":
    rr = dbStore.query_sql()

    dbStore.add_sql(4, "hahahah", 123)
    print(list(rr))

    rr = dbStore.query_sql(1)
    print(list(rr))
