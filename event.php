<?php 
include __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';

// Fetch events from database
$events = [];
$result = $mysqli->query("SELECT id, title, description, event_date, event_time, location, image FROM events ORDER BY event_date DESC");
if ($result) {
    $events = $result->fetch_all(MYSQLI_ASSOC);
}
?>

<!-- Page Header Start -->
        <div class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2>Upcoming Events</h2>
                    </div>
                    <div class="col-12">
                        <a href="">Home</a>
                        <a href="">Events</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page Header End -->
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>Upcoming Events</p>
                    <h2>Be ready for our upcoming charity events</h2>
                </div>
                <div class="row">
                <?php if (!empty($events)): ?>
                    <?php foreach ($events as $event): ?>
                    <div class="col-lg-6">
                        <div class="event-item">
                            <?php if (!empty($event['image'])): ?>
                                <img src="<?php echo htmlspecialchars($event['image']); ?>" alt="<?php echo htmlspecialchars($event['title']); ?>">
                            <?php else: ?>
                                <img src="img/event-1.jpg" alt="Image">
                            <?php endif; ?>
                            <div class="event-content">
                                <div class="event-meta">
                                    <?php if (!empty($event['event_date'])): ?>
                                        <p><i class="fa fa-calendar-alt"></i><?php echo date('d-M-Y', strtotime($event['event_date'])); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($event['event_time'])): ?>
                                        <p><i class="far fa-clock"></i><?php echo htmlspecialchars($event['event_time']); ?></p>
                                    <?php endif; ?>
                                    <?php if (!empty($event['location'])): ?>
                                        <p><i class="fa fa-map-marker-alt"></i><?php echo htmlspecialchars($event['location']); ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="event-text">
                                    <h3><?php echo htmlspecialchars($event['title']); ?></h3>
                                    <p><?php echo htmlspecialchars(substr($event['description'], 0, 150)) . '...'; ?></p>
                                    <a class="btn btn-custom" href="">Join Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="col-12">
                        <p style="text-align:center;color:#999;">No events scheduled yet.</p>
                    </div>
                <?php endif; ?>
                </div>
            </div>
        </div>
        <!-- Event End -->

<?php include __DIR__ . '/includes/footer.php'; ?>
