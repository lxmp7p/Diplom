from django.urls import path
from .views import *
from django.conf.urls import url

app_name = 'search'

urlpatterns = [
    path('search/', search, name='search'),
]