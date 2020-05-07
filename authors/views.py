from django.shortcuts import render, redirect, reverse
from django.views.generic import TemplateView
# Create your views here.
from .forms import AuthorForm
class IndexView(TemplateView):
    template_name = 'authors/index.html'


class CreateAuthorView(TemplateView):
    template_name = 'authors/create.html'

    def get_context_data(self, **kwargs):
        context = super().get_context_data(**kwargs)
        context['form'] = AuthorForm()
        return context

    def post(self, request):
        form = AuthorForm(request.POST)
        if form.is_valid():
            form.save()
            return redirect(reverse('authors:index'))
        return render(request, self.template_name, {'form':form})