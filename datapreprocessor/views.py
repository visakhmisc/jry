from django.shortcuts import render, redirect, reverse 
from django.http import HttpResponse
from django.http import HttpResponseRedirect
from datapreprocessor.models import StockRequests
import pandas as pd
import os
from pprint import pprint
from datapreprocessor.forms import LoginForm
from django.contrib.auth import authenticate

# Create your views here.


def login(request):
	if request.session.has_key('username'):
		return redirect(dashboard)
	if request.method == "POST":
		MyLoginForm = LoginForm(request.POST)
		if MyLoginForm.is_valid():
			username = MyLoginForm.cleaned_data['user_name']
			password = MyLoginForm.cleaned_data['password']
			user = authenticate(username=username, password=password)
			if user is not None:
				request.session['username'] = username
				return redirect(dashboard)
			else:
				return render(request, "login.html", {"error": "Please enter a valid user name/password"})
	else:
		return render(request, "login.html", {})


def logout(request):
	if request.session.has_key('username'):
		del request.session['username']
	return redirect(login)

def dashboard(request):
	return render(request, "dashboard.html", {})

def datas(request):
	return render(request, "datas.html", {})


# def stock_requests(request):
#    df = pd.DataFrame(list(StockRequests.objects.all().values()))
#    text = "<h1>welcome to branch stock requests!</h1>"
#    return render(request, "test.html", {"test": df.head()})


# def stock_requests(request):
#    df = pd.DataFrame(list(StockRequests.objects.all().values()))
#    text = "<h1>welcome to branch stock requests!</h1>"
#    test = df.describe()
#    return HttpResponse(str(df.dtypes))



def stock_requests(request):
   df = pd.DataFrame(list(StockRequests.objects.all().values()))
   text = "<h1>welcome to branch stock requests!</h1>"
   return render(request, "test.html", {"test": df.dtypes})




def explore_category(request):
	return render(request, "branch_stock_requests/explore_category.html", {})


def explore_number(request):
	return render(request, "branch_stock_requests/explore_number.html", {})




















































































































































