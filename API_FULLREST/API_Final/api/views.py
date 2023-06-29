from django.views import View
from  .models import Paciente
from django.http.response import JsonResponse
from django.utils.decorators import method_decorator 
from django.views.decorators.csrf import csrf_exempt
import json

# Métodos GET & POST
class PacientesView(View):

    @method_decorator(csrf_exempt)

    # Despacho (envío de datos)
    def dispatch(self, request, *args, **kwargs):
        return super().dispatch(request, *args, **kwargs)

    # Método GET    
    def get(self, request, id=0):

        if(id>0):

            pacientukis = list(Paciente.objects.filter(id=id).values())

            if len(pacientukis)>0:
                pacientenro= pacientukis[0]
                datos = {'pacientes':pacientukis}
            else:
                datos = {'message': 'No hay pacientes'}

            return JsonResponse(pacientukis, safe=False)

        else:
            pacientukis = list(Paciente.objects.values())

        if len(pacientukis)>0:
            datos = {'pacientes':pacientukis}
        else:
            datos = {'message': 'No hay pacientes'}
        return JsonResponse(pacientukis, safe=False)
    

    # Método POST
    def post(self, request):

        jd = json.loads(request.body)
        Paciente.objects.create(
            nombre = jd['nombre'],
            apellido = jd['apellido'],
            edad = jd['edad'],
            altura = jd['altura'],
            peso = jd['peso'],
            imc = jd['imc'],
            estado = jd['estado']
            )
        datos = {'message': "Sucess"}
        return JsonResponse(datos, safe=False)
    
    # Método PUT
    def put(self, request, id):

        jd = json.loads(request.body)
        pacientukis = list(Paciente.objects.filter(id=id).values())
        if len(pacientukis)>0:
            paciente= Paciente.objects.get(id=id)
            paciente.nombre = jd['nombre']
            paciente.apellido = jd['apellido']
            paciente.edad = jd['edad']
            paciente.altura = jd['altura']
            paciente.peso = jd['peso']
            paciente.imc = jd['imc']
            paciente.estado = jd['estado']
            paciente.save()
            datos = {'message': "Sucess"}

            
        else:
            datos = {'message': 'No hay pacientes'}

        return JsonResponse(datos, safe=False)

    # Método DELETE
    def delete(self, request, id):
        pacientukis = list(Paciente.objects.filter(id=id).values())
        if len(pacientukis)>0:
            paciente= Paciente.objects.get(id=id)
            paciente.delete()
            datos = {'message': "Sucess"}
        else:
            datos = {'message': 'No hay paciente'}

        return JsonResponse(datos, safe=False)