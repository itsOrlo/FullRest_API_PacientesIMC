from django.db import models

# Create your models here.
class Paciente(models.Model):
    nombre = models.CharField(max_length=50)
    apellido = models.CharField(max_length=50)
    edad = models.IntegerField()
    altura = models.FloatField()
    peso = models.FloatField()
    imc = models.FloatField()
    estado = models.CharField(max_length=50)