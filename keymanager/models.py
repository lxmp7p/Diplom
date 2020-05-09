from django.db import models
from django import forms


# Create your models here.


class Employees(models.Model):
    id = models.IntegerField(primary_key=True)
    name = models.CharField(max_length=150)
    profilepic = models.CharField(max_length=100)


class Kluchi(models.Model):
    id = models.AutoField(primary_key=True)
    room_number = models.IntegerField()


class AddKluchi(forms.Form):
    id = models.AutoField(primary_key=True)
    room_number = forms.IntegerField(label='room_number')


class KeyAccess(models.Model):
    id = models.AutoField(primary_key=True)
    id_key = models.ForeignKey(Kluchi, on_delete=models.DO_NOTHING)
    id_emp = models.ForeignKey(Employees, on_delete=models.DO_NOTHING)


class AddKeyAccess(forms.Form):
    id = models.AutoField(primary_key=True)
    id_key = forms.IntegerField(label='id_key')
    id_employee = forms.IntegerField(label='id_employee')


class LogKeys(models.Model):
    id = models.AutoField(primary_key=True)
    id_emp = models.ForeignKey(Employees, on_delete=models.DO_NOTHING)
    id_key = models.ForeignKey(Kluchi, on_delete=models.DO_NOTHING)
    datetake = models.DateTimeField()
    datereturn = models.DateTimeField()


class AddLogKeys(forms.Form):
    id = models.AutoField(primary_key=True)
    id_emp = forms.IntegerField(label='id_emp')
    id_key = forms.IntegerField(label='id_key')
    datetake = forms.DateTimeField(label='datetake')
    datereturn = forms.DateTimeField(label='datereturn')
