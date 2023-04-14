<?php
return [

    /**
     * You can generate API keys here: https://cloudconvert.com/dashboard/api/v2/keys.
     */

    'api_key' => env('CLOUDCONVERT_API_KEY', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMzIwNTY0ZDRmODY5NDRlMGJmODgwZGYxMDc3MzRiMzkxZGRjMjdkNjQyMjUyODU0NjFiMmM1YTBmNjJiM2U5MWIyOTkwNWQ0MjYyZjIxYjkiLCJpYXQiOjE2ODEyNDc2MjcuNjgxNDg1LCJuYmYiOjE2ODEyNDc2MjcuNjgxNDg2LCJleHAiOjQ4MzY5MjEyMjcuNjY4MzMsInN1YiI6IjYzMDE3NDUwIiwic2NvcGVzIjpbInVzZXIucmVhZCIsInVzZXIud3JpdGUiLCJ0YXNrLnJlYWQiLCJ0YXNrLndyaXRlIiwid2ViaG9vay5yZWFkIiwid2ViaG9vay53cml0ZSIsInByZXNldC5yZWFkIiwicHJlc2V0LndyaXRlIl19.LZTpXRDI-ff0qeWZ7Dm4dIFZsaBl0iQ_A9SUeGhHtR8UB10xVpaWvw-5Moqprd7Qs3IJ4NsCOk8THXRq7rK3ZHxJBam-hl2lXEjg7bHlAd2JX9PswcO9Xm6y3SXlb2ZDZEcvYjHz1tY-Gb4wjyn7_jAgoe2V-6A783GvVvUPQcNYHb0f01RLMX0dm70NgiNNgT3tOhO84tuMU5WwLEureqWOJE2JwIUM3gOBGDMOouB1CU2QseNolnjJUOLvhPyASIzswdVvZIcawrF-yNLhCoxl9y2Bcrwey_IeuzoILTJf9tYbckCW4uKqkb_Nb84cRnBOuwYWqwnUqR5L7mb05ZJBZo5mgq9ysjfvYoijxezpXWU0KmNRXWKVyGMu7X1GTL5roiyY51ocdd2gEtxiR9llcxtPv_8p2D4Kqfj7fST15A4iehH9UDwE23pzGDlU8FpY_vkuMDyWkTD5xENoUuLcw4CG4EoWOUYD1T_q6PpQ8dO2RmJRnJtqBLuParrMWaHusS1M5Ea4tmzS_G-bA18r0Fhi7nVcSbmLDCitpSa776zehRAAhePC6w5pFz7TYj8DPjf4U1VDD6Gfcb2D5rrdniJAvufImAmREkkWq5Zmyw7LoMRR8TsjP8L1241xsOfPVDyK7a0088aTDRQIurGjmV4S_Ug2VYkcNDRrk4Y'),

    /**
     * Use the CloudConvert Sanbox API (Defaults to false, which enables the Production API).
     */
    'sandbox' => env('CLOUDCONVERT_SANDBOX', false),

    /**
     * You can find the secret used at the webhook settings: https://cloudconvert.com/dashboard/api/v2/webhooks
     */
    'webhook_signing_secret' => env('CLOUDCONVERT_WEBHOOK_SIGNING_SECRET', '')

];
