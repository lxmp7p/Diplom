from django.db import models
from django import forms


# Create your models here.

class Equipment(models.Model):
    id = models.AutoField(primary_key=True)
    equip_name = models.CharField(max_length=150)
    serial_id = models.CharField(max_length=50)
    room = models.CharField(max_length=50)
    floor = models.IntegerField()
    building = models.CharField(max_length=50)
    quantity = models.IntegerField()


class AddEquip(forms.Form):
    id = models.AutoField(primary_key=True)
    equip_name = forms.CharField(label='equip_name', max_length=150)
    serial_id = forms.CharField(label='serial_id', max_length=50)
    room = forms.CharField(label='room', max_length=50)
    floor = forms.IntegerField(label='floor')
    building = forms.CharField(label='building', max_length=50)
    quantity = forms.IntegerField(label='quantity')
