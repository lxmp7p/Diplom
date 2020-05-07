from django.urls import path
from .views import *

app_name = 'homepage/'

urlpatterns = [
    path('', index_page, name='index'),
    path('articles/', articles, name='articles'),
]