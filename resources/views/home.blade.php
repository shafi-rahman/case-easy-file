@extends('layouts.app')
@section('content')
    <div class="body-header border-bottom border-primary @@cardClass">
        <div class="container-fluid">
            <div class="row g-3 mb-4">
                <div class="col">
                    <ul class="list-unstyled d-sm-flex justify-content-end mb-0 d-none">
                        <li><a class="color-400" href="docs/index.html">Documentation & Process</a></li>
                    </ul>
                </div>
            </div>
            <div class="row g-3">
                <div class="col-xl-8 col-lg-7 col-md-12">
                    <div class="welcome-text">
                        <h1 class="fs-4 mb-1">Hello, {{ Auth::user()->name }} </h1>
                        <span class="text-muted">Welcome back to your dashboard, if need a help <a
                                href="https://www.thememakker.com/contact/" class="link-warning">Contact us</a>.</span>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5 col-md-12 text-md-end">
                    <div class="d-lg-flex d-none justify-content-lg-end align-items-center mt-4">
                        <div class="progress" style="height: 5px; width: 170px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <label class="text-left ms-3 mb-0"><strong>80%</strong> Completed</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <ul class="nav nav-tabs tab-card border-0 px-0" role="tablist">
                            <li class="nav-item"><a class="text-uppercase nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#personal_details" href="#">Personal</a></li>
                            <li class="nav-item"><a class="text-uppercase nav-link" data-bs-toggle="tab"
                                    data-bs-target="#family_details" href="#">Family</a></li>
                            <li class="nav-item"><a class="text-uppercase nav-link" data-bs-toggle="tab"
                                    data-bs-target="#educational_details" href="#">Educational</a></li>
                            <li class="nav-item"><a class="text-uppercase nav-link" data-bs-toggle="tab"
                                    data-bs-target="#professional_details" href="#">Professional</a></li>
                            <li class="nav-item"><a class="text-uppercase nav-link" data-bs-toggle="tab"
                                    data-bs-target="#document_details" href="#">Documents</a></li>
                        </ul>
                        <div class="team-members d-none d-md-inline-block">
                            <label class="me-2">Recent Case Officer : &nbsp;</label>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#RecentChat" title=""><img
                                    class="avatar sm rounded-1" src="assets/img/xs/avatar3.jpg" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="Click to Talk" alt="friend"
                                    data-bs-original-title="Case Officer" aria-label="Case Officer"> Rishab Panth</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <svg viewBox="0 0 1920 220" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path class="fill-secondary" opacity="0.0625"
                d="M1929 507.333C1920.01 496 1909.68 486.333 1898.02 479C1866.38 459 1829.74 449 1794.43 439.333C1767.78 432 1740.13 424.333 1714.81 412.667C1643.2 379.667 1592.56 315.667 1543.6 253.667C1504.96 204.667 1464.99 154 1414.02 118C1278.78 22 1094.57 43 932.685 70C781.456 95.3333 593.252 127 448.352 38C401.051 9 362.411 -31 327.102 -74H326.103C361.412 -30.6667 400.385 9.33333 448.019 38.6667C511.309 77.6667 587.923 97 682.191 97.6667C762.802 98.3333 846.745 85.3333 932.685 71C1094.57 43.6667 1278.45 23 1413.69 119C1464.32 155 1504.29 205.667 1542.93 254.667C1591.9 316.667 1642.53 380.667 1714.48 413.667C1739.8 425.333 1767.44 433 1794.09 440.333C1829.4 450 1866.04 460 1897.69 480C1909.35 487.333 1920.01 497.333 1929 509V507.333Z" />
            <path class="fill-secondary" opacity="0.125"
                d="M1929 440C1906.35 431.333 1882.7 425.667 1859.38 420C1832.07 413.333 1803.75 406.333 1777.44 395C1703.16 363 1650.19 299 1598.56 237.333C1557.59 188.334 1515.62 137.667 1462.65 102.334C1322.08 7.66684 1134.55 34.0002 969.993 66.0002C816.432 96.0002 624.897 133.333 474.667 46.0002C422.37 15.6668 379.732 -27.3332 340.759 -73.6665H339.76C379.066 -26.9998 421.703 16.3335 474.334 46.6668C539.955 84.6668 618.901 102.334 714.835 100.667C797.112 99.0002 882.387 83.6668 969.993 66.6668C1134.55 34.6668 1321.75 8.3335 1461.99 103C1514.62 138.333 1556.92 189 1597.56 238C1649.19 300 1702.49 364 1776.77 396C1803.09 407.333 1831.4 414.333 1858.72 421C1882.03 426.667 1906.02 432.667 1928.67 441.333V440H1929Z" />
            <path class="fill-secondary" opacity="0.1875"
                d="M1929 401.333C1927.33 401 1925.67 400.667 1924.34 400.333C1896.02 394 1867.04 387.667 1840.06 377C1763.45 346.333 1707.49 282.333 1653.52 220.667C1610.55 171.667 1566.25 121 1511.62 86.0002C1365.05 -7.33317 1174.19 24.3335 1006.97 61.3335C850.742 95.6668 656.542 138.667 500.649 53.6668C443.355 22.3335 396.388 -23.9998 353.417 -73.6665H352.418C395.722 -23.6665 442.689 23.0002 500.316 54.6668C568.27 92.0002 649.214 108 747.48 103.667C831.422 100 918.362 82.0002 1007.3 62.3335C1174.52 25.3335 1365.06 -5.99984 1510.62 87.0002C1565.25 122 1609.55 172.333 1652.52 221.333C1706.82 283.333 1762.78 347.333 1839.4 378C1866.38 389 1895.69 395.333 1924 401.667C1925.67 402 1927.33 402.333 1929 402.667V401.333Z" />
            <path class="fill-secondary" opacity="0.25"
                d="M1929 367.333C1920.01 365 1911.35 362 1902.68 359C1823.74 329.333 1765.11 265.667 1708.15 203.667C1663.18 154.667 1616.55 104 1559.92 69.6667C1408.36 -22 1214.49 15 1044.61 56.6667C886.05 95.6667 688.52 144.333 527.63 61C464.34 28.6667 413.042 -21 365.742 -74H364.742C412.376 -20.6667 463.674 29.3333 526.964 62C597.249 98.3333 680.192 112.667 780.456 106C866.397 100.333 954.337 79.6667 1044.61 57.6667C1214.49 16 1408.36 -21 1559.25 70.3333C1615.88 104.667 1662.52 155.333 1707.49 204C1764.45 266 1823.07 330 1902.35 359.333C1911.01 362.667 1920.01 365.333 1929 368V367.333V367.333Z" />
            <path class="fill-secondary" opacity="0.3125"
                d="M1929 325.333C1865.04 293 1813.41 239 1762.78 186.666C1715.81 137.666 1666.85 86.9998 1608.22 53.3332C1451.33 -36.6668 1254.13 5.6665 1081.58 51.9998C920.361 95.6665 719.832 149.666 553.613 68.6665C485.326 35.3332 429.698 -18.0002 377.734 -74.3335H376.401C428.699 -18.0002 484.327 35.6665 553.28 69.3332C626.23 105 711.171 117.666 813.101 108.333C900.708 100.333 990.313 77.6665 1081.92 52.6665C1254.46 5.99983 1451.33 -36.0002 1607.89 53.6665C1666.51 87.3332 1715.15 138 1762.45 187C1813.08 239.333 1864.71 293.333 1929 326V325.333Z" />
            <path class="fill-secondary" opacity="0.375"
                d="M1929 270.333C1889.03 241 1853.05 205.333 1817.74 170C1768.44 121 1717.48 70.3333 1656.85 37.3333C1494.63 -51 1294.1 -3.66667 1118.89 48C955.003 96 751.477 155.667 579.595 76.6667C505.313 42.3333 445.354 -14.6667 388.393 -74H387.061C444.021 -14.3333 504.313 43 579.262 77.3333C654.543 112 741.484 123 845.745 111.333C935.017 101.333 1025.95 76 1118.89 48.6667C1294.1 -2.66666 1494.3 -50.3333 1656.19 38C1716.81 71 1767.78 121.667 1817.08 170.667C1852.72 206 1888.69 242 1929 271.333V270.333Z" />
            <path class="fill-secondary" opacity="0.4375"
                d="M1929 205.667C1909.68 188.667 1891.03 170.667 1872.71 153.333C1821.41 104.333 1768.44 53.6667 1705.49 21C1537.6 -65.6667 1333.74 -13 1155.86 43.3333C989.646 96 783.121 161.333 605.91 84.3333C525.632 49.3333 460.676 -11.6667 399.052 -74H397.72C459.677 -11.3333 524.966 50 605.577 85.3333C683.19 119 772.462 128.667 878.389 114.333C969.327 102.333 1061.6 74.3333 1156.2 44.3333C1334.08 -12 1537.6 -64.6667 1704.82 22C1767.44 54.6667 1820.41 105 1871.71 154C1890.36 172 1909.35 190 1928.67 207V205.667H1929Z" />
            <path class="fill-secondary" opacity="0.5"
                d="M1929 138C1928.33 137.667 1928 137 1927.33 136.667C1874.04 87.6667 1818.74 37 1753.79 5.00001C1580.91 -80.3333 1373.72 -22 1193.17 39C1024.62 96 814.766 167.333 632.225 92C545.618 56.3333 475.666 -8.66666 408.712 -74H407.38C474.667 -8.33333 544.952 57 631.892 93C711.837 126 803.108 133.667 911.034 117C1003.64 102.667 1097.57 72.3333 1193.51 40C1373.72 -21.3333 1580.91 -79.3333 1753.45 6C1818.08 38 1873.37 88.6667 1926.67 137.333C1927.33 138 1928 138.667 1929 139.333V138Z" />
            <path class="fill-secondary" opacity="0.5625"
                d="M1929 73.6667C1889.69 41 1848.39 10.3333 1802.42 -11.3333C1624.21 -95 1413.69 -31.6667 1230.48 34.3333C1059.26 96.3333 846.411 173 658.54 99.6667C565.604 63.3333 490.322 -5.66666 418.039 -74H416.373C488.99 -5.33333 564.604 64.3333 658.207 100.667C740.484 132.667 833.753 139 944.01 120C1038.28 103.667 1133.55 70.6667 1230.81 35.6667C1414.02 -30.3333 1624.21 -93.6667 1802.09 -9.99999C1848.06 11.6667 1889.69 42.3333 1929 75.3333V73.6667Z" />
            <path class="fill-secondary" opacity="0.625"
                d="M1929 17.3333C1904.02 0.333336 1878.37 -15 1851.05 -27.3333C1667.51 -109.333 1453.66 -40.6667 1267.79 30C1094.24 96.3333 878.056 178.667 685.189 107.333C586.257 70.6667 505.979 -2.33333 428.032 -73C427.699 -73.3333 427.366 -73.6667 426.7 -74H425.034C425.7 -73.3333 426.367 -72.6667 427.033 -72C504.979 -1.33333 585.257 72 684.522 108.333C769.131 139.667 864.732 144.333 976.655 122.667C1072.59 104 1169.19 68.6667 1268.12 31C1453.99 -39.6667 1667.51 -108.667 1850.72 -26.6667C1878.04 -14.3333 1904.02 1.00001 1929 18.3333V17.3333Z" />
            <path class="fill-secondary" opacity="0.6875"
                d="M1645.53 -74C1529.61 -60.3333 1412.69 -17.6667 1304.76 25.6667C1128.55 96.3333 909.701 184.333 711.171 115C609.574 79.6667 525.965 6.33333 445.353 -64.3333C441.689 -67.6667 438.025 -70.6667 434.361 -74H432.695C436.693 -70.3333 440.69 -67 444.687 -63.3333C525.298 7.66666 608.907 80.6667 710.837 116.333C797.778 146.667 895.377 149.667 1009.3 125.667C1106.9 105 1205.16 67.3333 1305.1 27C1416.02 -18 1536.94 -61.6667 1656.19 -74H1645.53Z" />
            <path class="fill-secondary" opacity="0.75"
                d="M1619.55 -74C1524.61 -52.6667 1430.34 -16 1342.07 21.3333C1163.53 96.3333 941.345 190 737.486 122.667C632.891 88.3333 546.617 15 463.008 -56C456.013 -62 448.684 -68 441.689 -74H439.69C447.352 -67.6667 454.68 -61.3333 462.342 -55C545.618 16 632.225 89.3333 736.819 124C826.091 153.333 926.023 155 1041.94 128.333C1141.21 105.667 1240.81 65.3333 1342.4 22.3333C1432.01 -15.3333 1528.28 -53 1624.88 -74H1619.55Z" />
            <path class="fill-secondary" opacity="0.8125"
                d="M1618.88 -74C1536.6 -50.3333 1455.33 -17 1379.04 16.6667C1198.17 96.3333 972.658 195.667 763.468 130.333C656.208 97 566.936 23.3333 480.329 -47.3333C469.67 -56.3333 458.678 -65 447.685 -74H445.687C457.012 -64.6667 468.338 -55.6667 479.663 -46.3333C566.27 24.6667 655.875 98.3333 763.135 131.667C854.739 160.333 956.669 160 1074.59 131C1175.52 106 1276.45 63.3333 1379.38 18C1457.32 -16.3333 1539.93 -50.3333 1623.54 -74H1618.88Z" />
            <path class="fill-secondary" opacity="0.875"
                d="M1627.87 -74C1555.26 -49.6667 1483.97 -18.6667 1416.35 12.3333C1232.81 96.6667 1004.64 201.667 789.784 138.333C679.859 106 587.256 32.3333 497.984 -38.6667C483.328 -50.6667 468.671 -62.3333 453.348 -74H451.35C466.672 -62 481.995 -50 497.318 -37.6667C586.923 33.3333 679.193 107 789.45 139.333C883.386 167 987.314 165.333 1107.57 133.667C1210.49 106.667 1312.76 61.3333 1417.02 13.3333C1485.64 -18 1558.26 -49.6667 1632.2 -74H1627.87Z" />
            <path class="fill-secondary" opacity="0.9375"
                d="M1642.2 -74C1577.57 -50 1514.29 -21 1453.66 7.99999C1267.79 96.6667 1036.28 207.333 816.098 146C703.509 114.667 607.908 41 515.638 -30.3333C496.651 -45 477.665 -59.6667 458.344 -74H456.013C475.666 -59.3333 495.319 -44.3333 514.639 -29.3333C606.909 42 702.51 115.667 815.432 147C911.699 174 1017.96 170.333 1139.88 136.333C1244.47 107.333 1348.07 59.3333 1453.99 8.99999C1515.62 -20.3333 1580.24 -49.6667 1645.86 -74H1642.2Z" />
            <path class="fill-secondary"
                d="M1659.85 -74.0002C1601.89 -50.3335 1545.26 -23.3335 1490.97 3.33317C1302.43 96.6665 1067.93 213 842.413 153.333C726.826 123 628.561 49.3332 533.293 -22.0002C509.975 -39.3335 486.325 -57.0002 462.341 -74.3335H460.01C484.659 -57.0002 508.643 -39.0002 532.626 -21.0002C627.894 50.3332 726.493 124 842.413 154.666C941.012 180.666 1049.27 175.666 1173.19 139C1279.45 107.667 1384.37 57.3332 1491.63 4.33317C1546.93 -23.0002 1604.56 -50.3335 1663.52 -74.3335H1659.85V-74.0002Z" />
            <path class="fill-primary" opacity="0.3"
                d="M1929 255.667C1872.04 223.333 1813.41 196.667 1754.12 176.333C1651.52 141 1548.93 124.667 1450 128C1315.42 132.667 1184.18 173.667 1057.27 213C1020.62 224.333 982.984 236 945.676 247C798.777 289 608.242 329 436.027 263.333C321.772 219.667 229.169 134 139.564 51.3333C119.911 33.6667 99.9244 15 79.9382 -2.66667C54.2891 -25.3333 24.976 -50.3333 -7.33517 -74H-10C22.9773 -50 52.9567 -24.6667 78.9389 -1.33334C98.9251 16.3333 118.911 35 138.231 52.6667C227.836 135.667 320.439 221.333 435.027 265C509.976 293.667 592.919 304.333 688.853 298C764.801 293 846.744 277.333 946.009 248.667C983.317 238 1021.29 226.333 1057.6 214.667C1184.51 175.333 1315.76 134.333 1450 129.667C1605.56 124.333 1772.44 169.333 1929 257.667V255.667Z" />
            <path class="fill-primary" opacity="0.4"
                d="M1929 227C1864.05 184 1796.42 150.333 1727.47 126.333C1642.86 97.0002 1558.26 83.6668 1476.31 86.6668C1365.39 90.6668 1256.8 124.334 1151.87 157C1121.56 166.334 1090.24 176 1059.6 185C938.348 219.667 780.79 252.667 638.554 198.667C544.286 162.667 467.672 92.0002 393.723 23.6668C377.734 9.00016 361.079 -6.33317 344.756 -20.9998C325.769 -37.6665 304.451 -55.9998 281.134 -73.6665H278.802C302.785 -55.6665 324.437 -37.3332 343.757 -19.9998C360.079 -5.33317 376.734 10.0002 392.723 24.6668C466.673 93.0002 543.287 164 637.888 200C699.846 223.667 768.465 232.667 847.411 227.333C910.368 223 977.655 210 1059.6 186.667C1090.24 177.667 1121.56 168 1151.87 158.667C1256.8 126 1365.05 92.3335 1475.98 88.3335C1623.88 82.6668 1783.77 132.667 1929 228.667V227Z" />
            <path class="fill-primary" opacity="0.5"
                d="M1929 333C1870.37 293.667 1809.75 260.667 1748.12 234.667C1647.86 192.667 1546.93 169.667 1447.66 166.667C1312.76 162.667 1179.18 195 1049.94 226C1012.63 235 974.323 244.333 936.349 252.667C787.118 285.333 594.251 312.667 426.699 235.667C315.442 184.667 228.502 93.3333 144.56 5C126.239 -14.3333 107.585 -34 88.9316 -53C82.2695 -60 75.2743 -67 67.946 -74H65.6143C73.2757 -66.3333 80.6039 -59 87.9322 -52C106.253 -33 125.24 -13 143.228 6C227.17 94.6667 314.11 186 425.7 237C498.317 270.333 579.927 286.333 674.862 286.333C675.528 286.333 676.194 286.333 676.527 286.333C752.808 286.333 835.418 276 936.349 254C974.323 245.667 1012.96 236.333 1049.94 227.333C1179.18 196.333 1312.76 164 1447 168C1606.89 172.667 1774.77 231.333 1928.67 334.667V333H1929Z" />
        </svg>
    </div>

    <div class="body-area">
        <div class="container-fluid pt-4">
            <div class="tab-content">

                <div class="tab-pane fade show active" id="personal_details" role="tabpanel">
                    <div class="row g-3 row-deck">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <svg class="position-absolute top-0 end-0 mt-4 me-3"
                                        xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path class="fill-muted"
                                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                        <path class="fill-primary"
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                    <div class="mb-2 text-uppercase">Personal Details</div>
                                    <div><span class="h4">20</span> <span class="small text-muted"><i
                                                class="fa fa-level-up"></i>%</span></div>
                                    <form class="row g-2 pt-3">
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="First Name">
                                                <label>First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                                <label>Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" placeholder="Email ID">
                                                <label>Email ID</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Mobile Number">
                                                <label>Mobile Number</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <div class="col-12">
                                                    <style>
                                                        .float-label label,
                                                        .float-label>span {
                                                            color: #c5c8ca;
                                                            background: none;
                                                            position: absolute;
                                                            cursor: text;
                                                            transition: all .3s ease-in-out;
                                                            transform: tr;
                                                            transform: translateY(-160%);
                                                            font-size: 12px;
                                                            opacity: 1;
                                                            left: 0.75rem;
                                                            top: 60%;
                                                            font-family: system-ui;
                                                        }
                                                    </style>
                                                    <label class="form-group float-label">
                                                        <select class="form-control form-control-lg custom-select"
                                                            style="height: 58px;">
                                                            <option value="1">Single</option>
                                                            <option value="2">Married</option>
                                                            <option value="3">Married With Kids</option>
                                                            <option value="4">Seperated</option>
                                                        </select>
                                                        <span>Choose Martial Status</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control form-control-lg datepicker"
                                                    placeholder="Select date of birth">
                                                <label>Select date of birth</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 p-3">
                                            <div class="form-floating">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">Select Gender <code></code></label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineMale" value="option1">
                                                    <label class="form-check-label" for="inlineMale">Male</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="gender"
                                                        id="inlineFemale" value="option2">
                                                    <label class="form-check-label" for="inlineFemale">Female</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <button class="btn btn-primary me-md-2 btn-lg" type="button">Save &
                                                Next</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="family_details" role="tabpanel">
                    <div class="row g-3 row-deck">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <svg class="position-absolute top-0 end-0 mt-4 me-3"
                                        xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path class="fill-muted"
                                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                        <path class="fill-primary"
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                    <div class="mb-2 text-uppercase">Family Details</div>
                                    <div><span class="h4">20</span> <span class="small text-muted"><i
                                                class="fa fa-level-up"></i>%</span></div>
                                    <form class="row g-2 pt-3">
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="First Name">
                                                <label>First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                                <label>Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="User ID">
                                                <label>User ID</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane fade" id="educational_details" role="tabpanel">
                    <div class="row g-3 row-deck">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <svg class="position-absolute top-0 end-0 mt-4 me-3"
                                        xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path class="fill-muted"
                                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                        <path class="fill-primary"
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                    <div class="mb-2 text-uppercase">Educational Details</div>
                                    <div><span class="h4">20</span> <span class="small text-muted"><i
                                                class="fa fa-level-up"></i>%</span></div>
                                    <form class="row g-2 pt-3">
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="First Name">
                                                <label>First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                                <label>Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="User ID">
                                                <label>User ID</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="tab-pane fade" id="professional_details" role="tabpanel">
                    <div class="row g-3 row-deck">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card overflow-hidden">
                                <div class="card-body">
                                    <svg class="position-absolute top-0 end-0 mt-4 me-3"
                                        xmlns="http://www.w3.org/2000/svg" width="26" fill="currentColor"
                                        viewBox="0 0 16 16">
                                        <path class="fill-muted"
                                            d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z" />
                                        <path class="fill-primary"
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                    </svg>
                                    <div class="mb-2 text-uppercase">Professional Details</div>
                                    <div><span class="h4">20</span> <span class="small text-muted"><i
                                                class="fa fa-level-up"></i>%</span></div>
                                    <form class="row g-2 pt-3">
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="First Name">
                                                <label>First Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                                <label>Last Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" placeholder="User ID">
                                                <label>User ID</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="progress" style="height: 4px;">
                                    <div class="progress-bar bg-secondary" role="progressbar" style="width: 100%"
                                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="tab-pane fade" id="document_details" role="tabpanel">
                    <div class="row g-3">

                        <div class="col-12">

                            <div class="card fieldset border border-primary">
                                <span class="fieldset-tile text-primary bg-body">Recent Invoices:</span>
                                <div class="owl-carousel owl-theme" id="recent_invoices">
                                    <div class="item card ribbon">
                                        <div class="option-9 position-absolute text-light"><i class="fa fa-star"></i>
                                        </div>
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">BB</div>
                                            <small class="text-muted">Total</small>
                                            <h4>USD 2,500</h4>
                                            <ul class="lh-lg mb-0 text-muted">
                                                <li>Bucky Barnes</li>
                                                <li>#RA0015</li>
                                                <li>Jan 01 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">DO</div>
                                            <small class="text-muted">Total</small>
                                            <h4>USD 5,520</h4>
                                            <ul class="lh-lg mb-0 text-muted">
                                                <li>Dean Otto</li>
                                                <li>#RA0016</li>
                                                <li>Jan 03 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">OL</div>
                                            <small class="text-muted">Total</small>
                                            <h4>USD 8,000</h4>
                                            <ul class="lh-lg mb-0 text-muted">
                                                <li>Orlando Lentz</li>
                                                <li>#RA0017</li>
                                                <li>Jan 03 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">AJ</div>
                                            <small class="text-muted">Total</small>
                                            <h4>USD 12,500</h4>
                                            <ul class="lh-lg mb-0 text-muted">
                                                <li>Andew Jon</li>
                                                <li>#RA0018</li>
                                                <li>Jan 05 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="item card">
                                        <div class="card-body">
                                            <div class="avatar lg rounded-circle no-thumbnail mb-3 fs-5">AJ</div>
                                            <small class="text-muted">Total</small>
                                            <h4>USD 7,100</h4>
                                            <ul class="lh-lg mb-0 text-muted">
                                                <li>Andew Jon</li>
                                                <li>#RA0018</li>
                                                <li>Jan 05 2022</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="col-12">

                            <div class="card fieldset border border-muted">
                                <span class="fieldset-tile text-muted bg-body">All Invoices:</span>
                                <table id="invoice_list" class="table card-table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="form-check" style="font-size: 16px;">
                                                    <input class="form-check-input select-all" type="checkbox"
                                                        value="">
                                                </div>
                                            </th>
                                            <th>Invoice</th>
                                            <th>Name</th>
                                            <th>Total</th>
                                            <th>Date</th>
                                            <th>Due Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0011 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar1.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Andew Jon</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 12,820</td>
                                            <td>Jan 16 2022</td>
                                            <td>Jan 20 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0012 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar2.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Orlando Lentz</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 2,000</td>
                                            <td>Jan 15 2022</td>
                                            <td>Jan 15 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0025 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar3.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Marshall Nichols</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 8,000</td>
                                            <td>Jan 10 2022</td>
                                            <td>Jan 12 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0023 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar4.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Nellie Maxwell</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 3,500</td>
                                            <td>Jan 07 2022</td>
                                            <td>Jan 08 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0026 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar5.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Marshall Nichols</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 250</td>
                                            <td>Jan 06 2022</td>
                                            <td>Jan 06 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0065 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar6.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Issa Bell</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 9,150</td>
                                            <td>Jan 03 2022</td>
                                            <td>Jan 05 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0015 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar7.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Dean Otto</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 5,000</td>
                                            <td>Jan 03 2022</td>
                                            <td>Jan 05 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0029 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar8.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Comeren Diaz</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 2,050</td>
                                            <td>Jan 03 2022</td>
                                            <td>Jan 05 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0028 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar9.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Chris Fox</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 2,000</td>
                                            <td>Jan 03 2022</td>
                                            <td>Jan 05 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                        <tr class="row-selectable">
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="">
                                                </div>
                                            </td>
                                            <td> #RA0035 </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="assets/img/xs/avatar10.jpg" class="rounded-circle sm avatar"
                                                        alt="">
                                                    <div class="ms-2 mb-0">Bucky Barnes</div>
                                                </div>
                                            </td>
                                            <td class="fw-bold">USD 1,100</td>
                                            <td>Feb 03 2022</td>
                                            <td>Feb 05 2022</td>
                                            <td>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"><i
                                                        class="fa fa-pencil"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_send"><i
                                                        class="fa fa-envelope"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="modal" data-bs-target="#invoice_detail"><i
                                                        class="fa fa-download"></i></button>
                                                <button type="button" class="btn btn-link btn-sm color-400"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><i
                                                        class="fa fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>




                            <div class="modal fade" id="invoice_send" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Invoice #RA0011</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body custom_scroll">
                                            <table class="card p-2">
                                                <tr>
                                                    <td></td>
                                                    <td style="text-align: center; width: 100%;">
                                                        <table class="table table-borderless mb-0" width="100%"
                                                            cellpadding="0" cellspacing="0">
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                    <h2 style="margin-bottom: 0;">$33.98 Paid</h2>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td
                                                                    style="padding-bottom: 30px 0; padding-top: 10px; text-align: center;">
                                                                    <h4 style="margin-bottom: 0;">Thanks for using TTM Inc.
                                                                    </h4>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 20px 0;">
                                                                    <table width="100%">
                                                                        <tr>
                                                                            <td> Attn: <strong>Daniel Marek</strong> 43-190
                                                                                Mikolow, Poland<br> Email: <a
                                                                                    href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                                                    class="__cf_email__"
                                                                                    data-cfemail="9af7fbe8fff1dafefbf4f3fff6b4f9f5f7">[email&#160;protected]</a><br>
                                                                                Phone: +48 123 456 789<br>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <table
                                                                                    class="table table-borderless table-striped mb-0"
                                                                                    cellpadding="0" cellspacing="0">
                                                                                    <tr>
                                                                                        <td style="text-align: left;">
                                                                                            Extended License</td>
                                                                                        <td style="text-align: right;">
                                                                                            $19.99</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">1
                                                                                            year subcription</td>
                                                                                        <td style="text-align: right;">
                                                                                            $9.99</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: left;">
                                                                                            Instalation and Customization
                                                                                        </td>
                                                                                        <td style="text-align: right;">
                                                                                            $4.00</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td style="text-align: right;"
                                                                                            width="80%">
                                                                                            <strong>Total</strong></td>
                                                                                        <td style="text-align: right;">
                                                                                            $33.98</td>
                                                                                    </tr>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 10px 0; text-align: center;">
                                                                    <a href="#">View in browser</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="padding: 0; text-align: center;"> TTM Inc. 70
                                                                    Bowman St. South Windsor, CT 06074 </td>
                                                            </tr>
                                                        </table>
                                                        <table width="100%"
                                                            style="text-align: center; margin-top: 40px;">
                                                            <tr>
                                                                <td class="aligncenter content-block">Questions? Email <a
                                                                        href="mailto:"><span class="__cf_email__"
                                                                            data-cfemail="81e8efe7eec1f5e9e4ece4ece0eaeae4f3afe2eeec">[email&#160;protected]</span></a>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary">Send Email</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="invoice_detail" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Invoice #RA0011</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body custom_scroll">
                                            <table class="table table-borderless mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td> Invoice <strong>01/Nov/2020</strong>
                                                            </th>
                                                        <td class="text-end">
                                                            <span class="text-danger"> <strong>Status:</strong>
                                                                Pending</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <div>From:</div>
                                                            <div class="fs-6 fw-bold mb-1">Webz Poland</div>
                                                            <div>Madalinskiego 8</div>
                                                            <div>71-101 Szczecin, Poland</div>
                                                            <div>Email: <a
                                                                    href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                                    class="__cf_email__"
                                                                    data-cfemail="90f9fef6ffd0e7f5f2eabef3fffdbee0fc">[email&#160;protected]</a>
                                                            </div>
                                                            <div>Phone: +48 444 666 3333</div>
                                                        </td>
                                                        <td class="text-end">
                                                            <div>To:</div>
                                                            <div class="fs-6 fw-bold mb-1">Bob Mart</div>
                                                            <div>Attn: Daniel Marek</div>
                                                            <div>43-190 Mikolow, Poland</div>
                                                            <div>Email: <a
                                                                    href="https://www.wrraptheme.com/cdn-cgi/l/email-protection"
                                                                    class="__cf_email__"
                                                                    data-cfemail="d9b4b8abbcb299bdb8b7b0bcb5f7bab6b4">[email&#160;protected]</a>
                                                            </div>
                                                            <div>Phone: +48 123 456 789</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <table class="table table-borderless table-striped mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">#</th>
                                                                        <th>Item</th>
                                                                        <th>Description</th>
                                                                        <th class="text-end">Unit Cost</th>
                                                                        <th class="text-center">Qty</th>
                                                                        <th class="text-end">Total</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center">1</td>
                                                                        <td>Origin License</td>
                                                                        <td>Extended License</td>
                                                                        <td class="text-end">$999,00</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-end">$999,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">2</td>
                                                                        <td>Custom Services</td>
                                                                        <td>Instalation and Customization (cost per hour)
                                                                        </td>
                                                                        <td class="text-end">$150,00</td>
                                                                        <td class="text-center">20</td>
                                                                        <td class="text-end">$3.000,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">3</td>
                                                                        <td>Hosting</td>
                                                                        <td>1 year subcription</td>
                                                                        <td class="text-end">$499,00</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-end">$499,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="text-center">4</td>
                                                                        <td>Platinum Support</td>
                                                                        <td>1 year subcription 24/7</td>
                                                                        <td class="text-end">$3.999,00</td>
                                                                        <td class="text-center">1</td>
                                                                        <td class="text-end">$3.999,00</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="3">
                                                                            <h6>Terms &amp; Condition</h6>
                                                                            <p class="text-muted">You know, being a test
                                                                                pilot isn't always the healthiest business
                                                                                in the world. We predict too much for the
                                                                                next year and yet far too little for the
                                                                                next 10.</p>
                                                                        </td>
                                                                        <td colspan="3">
                                                                            <table class="table table-borderless mb-0">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td><strong>Subtotal</strong></td>
                                                                                        <td class="text-end">$8.497,00</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>VAT (10%)</strong></td>
                                                                                        <td class="text-end">$679,76</td>
                                                                                    </tr>
                                                                                    <tr>
                                                                                        <td><strong>Total</strong></td>
                                                                                        <td class="text-end">
                                                                                            <strong>$7.477,36</strong></td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"><i
                                                    class="fa fa-print me-2"></i>Print</button>
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
