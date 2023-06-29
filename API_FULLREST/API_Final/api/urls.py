from django.urls import path
from .views import PacientesView

urlpatterns = [

    path('pacientukis/', PacientesView.as_view(), name='lista_pacientes'),
    path('pacientukis/<int:id>', PacientesView.as_view(), name='lista_pacientesid')

]