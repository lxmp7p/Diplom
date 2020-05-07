from django.contrib import admin
from authors.models import Author
# Register your models here.

@admin.register(Author)
class AuthorAdmin(admin.ModelAdmin):
    list_display = ('id', '__str__', 'email_domain', 'level',)
    list_display_links = ('__str__',)


    def email_domain(self, obj):
        if obj.email is not None:
            return obj.email.partition('@')[2]
