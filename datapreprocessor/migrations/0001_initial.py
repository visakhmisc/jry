# Generated by Django 2.1 on 2018-02-24 12:58

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='StockRequests',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('branch_name', models.CharField(max_length=255, null=True)),
                ('branch_location', models.CharField(max_length=255, null=True)),
                ('transaction_id', models.IntegerField(null=True)),
                ('food_type', models.CharField(max_length=255, null=True)),
                ('item_type', models.CharField(max_length=255, null=True)),
                ('item_unit', models.CharField(max_length=255, null=True)),
                ('item_base', models.IntegerField(null=True)),
                ('item_packet', models.IntegerField(null=True)),
                ('quantity', models.FloatField(null=True)),
                ('created_by', models.IntegerField(null=True)),
                ('status', models.CharField(max_length=255, null=True)),
                ('requested_at', models.DateTimeField(null=True)),
                ('allocated_at', models.DateTimeField(null=True)),
            ],
            options={
                'db_table': 'stock_requests',
            },
        ),
    ]