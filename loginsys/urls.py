from django.urls import path
from .views import *
from django.conf.urls import url

app_name = 'login'

urlpatterns = [
    path('', login, name='login'),
    path('logout/', logout, name='logout'),
]