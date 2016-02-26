from flask.ext.wtf import Form
from wtforms.validators import Required
from wtforms import StringField, SubmitField


class SubmitRecordForm(Form):
    name = StringField("Name", validators=[Required()])
    price = StringField("Price", validators=[Required()])
    submit = SubmitField('ubmit')
