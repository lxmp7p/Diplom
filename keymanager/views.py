from django.shortcuts import render
from django.contrib import auth
from django.http import HttpResponseRedirect
 
 
def keymanager(request):
    return render(request, "keymanager/index.html", {'username': auth.get_user(request).username})
