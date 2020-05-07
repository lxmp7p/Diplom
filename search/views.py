from django.shortcuts import render
from django.contrib import auth
from django.http import HttpResponseRedirect
from .models import AddEquip
from homepage.models import Equipment


# Create your views here.

def search(request):
    if request.method == "POST":
        if request.POST['addnew'] == 'true':
            form = AddEquip(data={'equip_name': request.POST['equip_name'],
                                  'serial_id': request.POST['serial_id'],
                                  'room': request.POST['room'],
                                  'floor': request.POST['floor'],
                                  'building': request.POST['building'],
                                  'quantity': request.POST['quantity']})
            if form.is_valid():
                entry = Equipment(equip_name=form.cleaned_data['equip_name'],
                                  serial_id=form.cleaned_data['serial_id'],
                                  room=form.cleaned_data['room'],
                                  floor=form.cleaned_data['floor'],
                                  building=form.cleaned_data['building'],
                                  quantity=form.cleaned_data['quantity'])
                entry.save()
                return HttpResponseRedirect('/search/search/?iteam=' + request.POST['query'])

        elif request.POST['edit'] == 'true':
            form = AddEquip(data={'equip_name': request.POST['equip_name'],
                                  'serial_id': request.POST['serial_id'],
                                  'room': request.POST['room'],
                                  'floor': request.POST['floor'],
                                  'building': request.POST['building'],
                                  'quantity': request.POST['quantity']})
            if form.is_valid():
                editrow = Equipment.objects.get(id=request.POST['id'])
                editrow.room = form.cleaned_data['room']
                editrow.serial_id = form.cleaned_data['serial_id']
                editrow.equip_name = form.cleaned_data['equip_name']
                editrow.room = form.cleaned_data['room']
                editrow.floor = form.cleaned_data['floor']
                editrow.building = form.cleaned_data['building']
                editrow.quantity = form.cleaned_data['quantity']
                editrow.save()
                return HttpResponseRedirect('/search/search/?iteam=' + request.POST['query'])
        elif request.POST['delete'] == 'true':
            delrow = Equipment.objects.get(id=request.POST['id'])
            delrow.delete()
            return HttpResponseRedirect('/search/search/?iteam=' + request.POST['query'])
    elif request.method == "GET" and 'iteam' in request.GET:
        search_item = request.GET['iteam']
        search_result = []
        for p in Equipment.objects.raw(
                "SELECT * FROM homepage_equipment WHERE equip_name LIKE '%" + search_item + "%' " +
                "or serial_id LIKE '%" + search_item + "%' or building LIKE '%" + search_item + "%'"):
            search_result.append(p)
        return render(request, 'search/search.html',
                      {'username': auth.get_user(request).username, 'results': search_result, 'q': search_item})
    return render(request, 'search/search.html',
                  {'username': auth.get_user(request).username})
