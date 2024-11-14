$( document ).ready(function() {
    const jsonFormatter = (value, row, prefix = '') => {
        if (!value || typeof value !== 'object')
            return value;

        const keys = Object.keys(value);
        return keys.map(key => {
            if(typeof value[key] === 'object' ){
                return `<p>${key}: ${jsonFormatter(value[key], row, `${prefix}${key}.`)}</p>`
            }
            return `<p>${key}: ${value[key]}</p>`
        }).join('');
    };
    const fetchClientInfo = (transactionId) => {
        const token = localStorage.getItem("token");
        $.ajax({
            type: "GET",
            url: `/api/transaction/${transactionId}/client`,
            contentType: "application/json; charset=utf-8",
            headers:{
                "Authorization": token
            },
            dataType: "json",
            success: function(data){
                if(data.customerInfo){
                    const customerInfo = data.customerInfo;
                    $("#clientInfoDetail").bootstrapTable({
                        columns: [

                        {
                            field: 'id',
                            title: 'Id',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'billingAddress1',
                            title: 'Billing Address',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'billingCity',
                            title: 'Billing City',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'billingCompany',
                            title: 'Billing Company',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'billingFirstName',
                            title: 'Billing First Name',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'billingLastName',
                            title: 'Billing Last Name',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'created_at',
                            title: 'Created At',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'email',
                            title: 'Email',
                            formatter: jsonFormatter
                        },
                        {
                            field: 'updated_at',
                            title: 'Updated At',
                            formatter: jsonFormatter
                        }
                    ],
                        data: [customerInfo]
                    })
                }
            },
            error: function(errMsg) {
                alert(errMsg);
            }
        });

    };
    const fetchTransactionInfo = (transactionId) => {
        const token = localStorage.getItem("token");
        $.ajax({
            type: "GET",
            url: `/api/transaction/${transactionId}`,
            contentType: "application/json; charset=utf-8",
            headers:{
                "Authorization": token
            },
            dataType: "json",
            success: function(response){
                if(response.transaction){
                    const merchantInfo = response.transaction.merchant;
                    // 'referenceNo', 'merchantId', 'status', 'channel', 'customData', 'chainId', 'type', 'agentInfoId', 'operation', 'updated_at', 'created_at', 'id', 'fxTransactionId', 'acquirerTransactionId', 'code', 'message', 'transactionId', 'agent
                    $("#txInfoDetail").bootstrapTable({
                        columns: [{
                            field: 'referenceNo',
                            title: 'Reference No',
                            formatter: jsonFormatter
                        }, {
                            field: 'merchantId',
                            title: 'Merchant Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'status',
                            title: 'Status',
                            formatter: jsonFormatter
                        }, {
                            field: 'channel',
                            title: 'Channel',
                            formatter: jsonFormatter
                        }, {
                            field: 'customData',
                            title: 'Custom Data',
                            formatter: jsonFormatter
                        }, {
                            field: 'chainId',
                            title: 'Chain Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'type',
                            title: 'Type',
                            formatter: jsonFormatter
                        }, {
                            field: 'agentInfoId',
                            title: 'Agent Info Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'operation',
                            title: 'Operation',
                            formatter: jsonFormatter
                        }, {
                            field: 'updated_at',
                            title: 'Updated At',
                            formatter: jsonFormatter
                        }, {
                            field: 'created_at',
                            title: 'Created At',
                            formatter: jsonFormatter
                        }, {
                            field: 'id',
                            title: 'Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'fxTransactionId',
                            title: 'FX Transaction Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'acquirerTransactionId',
                            title: 'Acquirer Transaction Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'code',
                            title: 'Code',
                            formatter: jsonFormatter
                        }, {
                            field: 'message',
                            title: 'Message',
                            formatter: jsonFormatter
                        }, {
                            field: 'transactionId',
                            title: 'Transaction Id',
                            formatter: jsonFormatter
                        }, {
                            field: 'agent',
                            title: 'Agent',
                            formatter: jsonFormatter
                        }],
                        data: [merchantInfo]
                    });

                }
            },
            error: function(errMsg) {
                alert(errMsg);
            }
        });

    };
    const fetchTransactionQuery = (request) => {
        const token = localStorage.getItem("token");
        $.ajax({
            type: "POST",
            url: `/api/transaction/list`,
            data: JSON.stringify(request),
            contentType: "application/json; charset=utf-8",
            headers:{
                "Authorization": token
            },
            dataType: "json",
            success: function(response){
                if(response.data){
                    const info = response?.data;
                    $('#txQuery-table').bootstrapTable({
                        columns: [{
                            field: 'customerInfo',
                            title: 'Customer Info',
                            formatter: jsonFormatter
                        }, {
                            field: 'merchant',
                            title: 'Merchant Info',
                            formatter: jsonFormatter

                        }, {
                            field: 'fx',
                            title: 'FX Info',
                            formatter: jsonFormatter

                        }, {
                            field: 'transaction',
                            title: 'TX Info',
                            formatter: jsonFormatter

                        }],
                        data: info
                    })
                }
            },
            error: function(errMsg) {
                alert(errMsg);
            }
        });

    };
    const fetchTransactionReport = (request) => {
        const token = localStorage.getItem("token");
        $.ajax({
            type: "POST",
            url: "/api/transaction/report",
            data: JSON.stringify(request),
            contentType: "application/json; charset=utf-8",
            headers:{
                "Authorization": token
            },
            dataType: "json",
            success: function(data){
                if(data.response){
                    const info = data?.response;
                    $('#txReport-table').bootstrapTable({
                        columns: [{
                            field: 'currency',
                            title: 'currency',
                            formatter: jsonFormatter
                        }, {
                            field: 'count',
                            title: 'count',
                            formatter: jsonFormatter
                        }, {
                            field: 'total',
                            title: 'total',
                            formatter: jsonFormatter
                        }],
                        data: info
                    })
                }
            },
            error: function(errMsg) {
                alert(errMsg);
            }
        });

    };

    $('#form-txReport-info').on('submit', function(e){
        e.preventDefault();
        const fromDate = $("#txReport-fromDate").val();
        const toDate = $("#txReport-toDate").val();


        fetchTransactionReport({fromDate,toDate});
    });

    $('#form-txQuery-info').on('submit', function(e){
        e.preventDefault();
        const fromDate = $("#txQuery-fromDate").val();
        const toDate = $("#txQuery-toDate").val();
        const merchantId = $("#txQuery-merchantId").val();
        const page = $("#txQuery-page").val();


        fetchTransactionQuery({fromDate,toDate,merchantId,page});
    });

    $('#form-transaction-info').on('submit', function(e){
        e.preventDefault();
        const transactionId = $("#client-transaction-tx-id").val();
        fetchTransactionInfo(transactionId);
    });

    $('#form-client-info').on('submit', function(e){
        e.preventDefault();
        const transactionId = $("#client-info-tx-id").val();
        fetchClientInfo(transactionId);
    });

    // login
    $('#form-signin').on('submit', function(e){
        e.preventDefault();
        const email = $("#username").val();
        const password = $("#password").val();
        const request = {email, password};


        $.ajax({
            type: "POST",
            url: "/api/auth/login",
            data: JSON.stringify(request),
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data){
                if(data.access_token){
                    localStorage.setItem("token", data.access_token);
                    $("#login").hide();
                    $("#clientInfo").show();
                    $("#txQuery").show();
                    $("#txReport").show();
                    $("#txInfo").show();

                }
            },
            error: function(errMsg) {
                alert(errMsg);
            }
        });

    });




});