from flask_wtf import Form
from wtforms.validators import Required
from wtforms import StringField, SubmitField


class SubmitRecordForm(Form):
    name = StringField("Name", validators=[Required()])
    price = StringField("Price", validators=[Required()])
    submit = SubmitField('Submit')


class QueryRecordForm(Form):
    query = SubmitField("query")
