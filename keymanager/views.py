from django.http import HttpResponse
from django.shortcuts import render
 
 
def keymanager(request):
    return render(request, "keymanager/index.html")