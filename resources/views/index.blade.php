<html>
<head>
    <title>Interview Sample Page</title>
    <script
            src="https://code.jquery.com/jquery-3.7.0.min.js"
            integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.css">
    <script src="https://unpkg.com/bootstrap-table@1.22.0/dist/bootstrap-table.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.0/dist/locale/bootstrap-table-en-US.min.js"></script>
    @vite('resources/js/app.js')
</head>
<body>
<main>

<div id="login" class="wrapper">
    <form id="form-signin" class="form-signin">
        <h2 class="form-signin-heading">Please login</h2>
        <input value="demo@financialhouse.io" type="text" class="form-control" id="username" placeholder="Email Address" required autofocus />
        <input value="cjaiU8CV" type="password" class="form-control" id="password" placeholder="Password" required />
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
</div>


    <div style="display: none" id="clientInfo" class="card">
        <div class="card-body">
            <h5 class="card-title">Client Info</h5>

            <form id="form-client-info">
                <label class="form-signin-heading">Transaction ID:</label>
                <input value="1067301-1675430916-3" type="text" class="form-control" id="client-info-tx-id" placeholder="Transaction ID" required autofocus />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Fetch</button>
            </form>

            <div id="clientInfoDetail"></div>
        </div>
    </div>

    <div style="display: none" id="txQuery" class="card">
        <div class="card-body">
            <h5 class="card-title">Transactions Query</h5>

            <form id="form-txQuery-info">
                <label class="form-signin-heading">Fetch Parameters:</label>
                <input value="2015-07-01" type="text" class="form-control" id="txQuery-fromDate" placeholder="From Date" required autofocus />
                <input value="2023-10-01" type="text" class="form-control" id="txQuery-toDate" placeholder="To Date" required autofocus />
                <input value="3" type="text" class="form-control" id="txQuery-merchantId" placeholder="Merchant ID" required autofocus />
                <input value="1" type="text" class="form-control" id="txQuery-page" placeholder="Page" required autofocus />

                <button class="btn btn-lg btn-primary btn-block" type="submit">Fetch</button>
            </form>

            <table id="txQuery-table">

            </table>

        </div>
    </div>


    <div style="display: none" id="txReport" class="card">
        <div class="card-body">
            <h5 class="card-title">Transactions Report</h5>

            <form id="form-txReport-info">
                <label class="form-signin-heading">Transaction ID:</label>
                <input value="2015-07-01" type="text" class="form-control" id="txReport-fromDate" placeholder="From Date" required autofocus />
                <input value="2023-10-01" type="text" class="form-control" id="txReport-toDate" placeholder="To Date" required autofocus />

                <button class="btn btn-lg btn-primary btn-block" type="submit">Fetch</button>
            </form>

            <table id="txReport-table">

            </table>

        </div>
    </div>

    <div style="display: none" id="txInfo" class="card">
        <div class="card-body">
            <h5 class="card-title">Transaction Info</h5>
            <form id="form-transaction-info">
                <label class="form-signin-heading">Fetch Parameters:</label>
                <input value="1067301-1675430916-3" type="text" class="form-control" id="client-transaction-tx-id" placeholder="Transaction ID" required autofocus />
                <button class="btn btn-lg btn-primary btn-block" type="submit">Fetch</button>
            </form>
            <div id="txInfoDetail"></div>
        </div>
    </div>


</main>


</body>
</html>