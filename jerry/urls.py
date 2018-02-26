"""jerry URL Configuration

The `urlpatterns` list routes URLs to views. For more information please see:
    https://docs.djangoproject.com/en/dev/topics/http/urls/
Examples:
Function views
    1. Add an import:  from my_app import views
    2. Add a URL to urlpatterns:  path('', views.home, name='home')
Class-based views
    1. Add an import:  from other_app.views import Home
    2. Add a URL to urlpatterns:  path('', Home.as_view(), name='home')
Including another URLconf
    1. Import the include() function: from django.urls import include, path
    2. Add a URL to urlpatterns:  path('blog/', include('blog.urls'))
"""
from django.contrib import admin
from django.urls import path

from datapreprocessor import views as dp_view

urlpatterns = [
    path('admin/', admin.site.urls),
    path('login/', dp_view.login, name = 'login'),
    path('logout/', dp_view.logout, name = 'logout'),
    path('dashboard/', dp_view.dashboard, name = 'dashboard'),
    path('datas/', dp_view.datas, name = 'datas'),
    path('explore_category/', dp_view.explore_category),
    path('explore_number/', dp_view.explore_number),
    path('stock_requests/', dp_view.stock_requests),
]
