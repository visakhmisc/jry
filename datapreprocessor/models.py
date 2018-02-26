from django.db import models

# Create your models here.

class StockRequests(models.Model):

   branch_name = models.CharField(max_length = 255, null = True)
   branch_location = models.CharField(max_length = 255, null = True)
   transaction_id = models.IntegerField(null = True)
   food_type = models.CharField(max_length = 255, null = True)
   item_type = models.CharField(max_length = 255, null = True)
   item_unit = models.CharField(max_length = 255, null = True)
   item_base = models.IntegerField(null = True)
   item_packet = models.IntegerField(null = True)
   quantity = models.FloatField(null = True)
   created_by = models.IntegerField(null = True)
   status = models.CharField(max_length = 255, null = True)
   requested_at = models.DateTimeField(null = True)
   allocated_at = models.DateTimeField(null = True)

   class Meta:
      db_table = "stock_requests"  # the actual 'table_name'





class Stocks(models.Model):

   branch_name = models.CharField(max_length = 255, null = True)
   branch_location = models.CharField(max_length = 255, null = True)
   food_type = models.CharField(max_length = 255, null = True)
   item_type = models.CharField(max_length = 255, null = True)
   item_unit = models.CharField(max_length = 255, null = True)
   item_base = models.IntegerField(null = True)
   item_packet = models.IntegerField(null = True)
   restaurant_initial_stock_quantity = models.FloatField(null = True)
   restaurant_stock_remaining_now = models.FloatField(null = True)
   price_per_quantity = models.FloatField(null = True)
   restaurant_stock_created_at = models.DateTimeField(null = True)
   vendor = models.CharField(max_length = 255, null = True)
   vendor_contact_number = models.CharField(max_length = 255, null = True)
   quantity = models.FloatField(null = True)
   restaurant_stock_allocated_at= models.DateTimeField(null = True)

   class Meta:
      db_table = "stocks"  # the actual 'table_name'





class Sales(models.Model):

   branch_name = models.CharField(max_length = 255, null = True)
   branch_location = models.CharField(max_length = 255, null = True)
   food_type = models.CharField(max_length = 255, null = True)
   amount = models.FloatField(null = True)
   sold_at = models.DateTimeField(null = True)
   
   class Meta:
      db_table = "sales"  # the actual 'table_name'

















































































