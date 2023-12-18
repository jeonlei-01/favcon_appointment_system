<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500&display=swap" rel="stylesheet">
    <title></title>
</head>
<body>
    <main>
        <form>
            <div>
                <h1>Select Service</h1>
                <div  id="services">
                    <div id="left">
                        <div>
                            <input type="radio" id="management" name="service" value="social media management">
                            <label for="management">Social Media Management</label>
                        </div>

                        <div>
                            <input type="radio" id="marketing" name="service" value="social media marketing">
                            <label for="marketing">Social Media Marketing</label>
                        </div>

                        <div>
                            <input type="radio" id="ads" name="service" value="paid social ads">
                            <label for="ads">Paid Social Ads</label>
                        </div>
                    </div>
                    <div id="right">
                        <div>
                            <input type="radio" id="design" name="service" value="graphic design">
                            <label for="design">Graphic Design</label>
                        </div>

                        <div>
                            <input type="radio" id="consultation" name="service" value="marketing / branding consultation">
                            <label for="consultation">Marketing / Branding Consultation</label>
                        </div>
                    </div>
                </div>
            </div>

            <div id="time-and-date">
                <h1>Select Time</h1>
                <div id="calendar">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="7">November 2021</th>
                            </tr>
                            <tr>
                                <th>Sun</th>
                                <th>Mon</th>
                                <th>Tue</th>
                                <th>Wed</th>
                                <th>Thu</th>
                                <th>Fri</th>
                                <th>Sat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>1</td>
                                <td>2</td>
                                <td>3</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>5</td>
                                <td>6</td>
                                <td>7</td>
                                <td>8</td>
                                <td>9</td>
                                <td>10</td>
                            </tr>
                            <tr>
                                <td>11</td>
                                <td>12</td>
                                <td>13</td>
                                <td>14</td>
                                <td>15</td>
                                <td>16</td>
                                <td>17</td>
                            </tr>
                            <tr>
                                <td>18</td>
                                <td>19</td>
                                <td>20</td>
                                <td>21</td>
                                <td>22</td>
                                <td>23</td>
                                <td>24</td>
                            </tr>
                            <tr>
                                <td>25</td>
                                <td>26</td>
                                <td>27</td>
                                <td>28</td>
                                <td>29</td>
                                <td>30</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div id="time-box">
                    <div class="hour">9:00 am</div>
                    <div class="hour">10:00 am</div>
                    <div class="hour">11:00 am</div>
                    <div class="hour">12:00 pm</div>
                    <div class="hour">1:00 pm</div>
                    <div class="hour">2:00 pm</div>
                    <div class="hour">3:00 pm</div>
                    <div class="hour">4:00 pm</div>
                    <div class="hour">5:00 pm</div>
                </div>
            </div>

            <div id="additional-form">
                <h1>Add your details</h1>
                <div>

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div>
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" required>
                </div>
                <div>
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div>
                    <label for="notes">Notes:</label>
                    <textarea id="notes" name="notes"></textarea>
                </div>
            </div>
            </div>
            <button type="submit">Submit</button>
        </form>

    </main>

</body>
</html>
