from django.db import models

# Create your models here.
class Author(models.Model):

    class Meta:
        verbose_name = "AuthorsModel"
        verbose_name_plural = "AuthorsModels"

    LEVELS = (
        ('J', 'JUNIOR'),
        ('M', 'MIDDLE'),
        ('S', 'SENIOR')
    )

    first_name = models.CharField(max_length=50)
    last_name = models.CharField(max_length=50)
    email = models.EmailField(null=True)
    level = models.CharField(max_length=1, choices=LEVELS)
    def __str__(self):
        return f'{self.first_name} {self.last_name}'