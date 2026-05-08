<!-- DESTINATIONS -->
<section class="destinations" id="destinations">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Study Destinations</span>
            <h2 class="section-title">Choose Your Dream Destination</h2>
            <p class="section-subtitle">We partner with top universities across the globe. Pick a destination and start your journey.</p>
        </div>
        
        <div class="dest-grid">
            <?php
            $destinations = [
                ['name'=>'United Kingdom','flag'=>'🇬🇧','desc'=>'World-class education with post-study work opportunities and rich cultural heritage.','img'=>'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=600&q=80'],
                ['name'=>'Australia','flag'=>'🇦🇺','desc'=>'1,100+ institutions with world-class education and outstanding lifestyle experience.','img'=>'https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=600&q=80'],
                ['name'=>'Malaysia','flag'=>'🇲🇾','desc'=>'Budget-friendly education with multicultural campus life in Southeast Asia.','img'=>'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=600&q=80'],
                ['name'=>'South Korea','flag'=>'🇰🇷','desc'=>'Innovative technology, rich culture, and high-quality education in East Asia.','img'=>'https://images.unsplash.com/photo-1517154421773-0529f29ea451?w=600&q=80'],
                ['name'=>'Cyprus','flag'=>'🇨🇾','desc'=>'Mediterranean charm with affordable high-quality European degree programs.','img'=>'https://images.unsplash.com/photo-1518459031867-a89b944bffe4?w=600&q=80'],
                ['name'=>'Malta','flag'=>'🇲🇹','desc'=>'English-speaking island nation with great weather and affordable tuition.','img'=>'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=600&q=80'],
                ['name'=>'Russia','flag'=>'🇷🇺','desc'=>'Deep academic traditions and cutting-edge research in science and arts.','img'=>'https://images.unsplash.com/photo-1513326738677-b964603b136d?w=600&q=80'],
            ];
            foreach($destinations as $d): ?>
            <div class="dest-card">
                <div class="dest-card-img">
                    <img src="<?=$d['img']?>" alt="<?=$d['name']?>">
                    <span class="flag"><?=$d['flag']?></span>
                </div>
                <div class="dest-card-body">
                    <h3><?=$d['name']?></h3>
                    <p><?=$d['desc']?></p>
                    <a href="#" class="dest-link">Explore <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- SERVICES -->
<section class="services" id="services">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Our Services</span>
            <h2 class="section-title">End-to-End Support for Your Journey</h2>
            <p class="section-subtitle">From your first consultation to landing at your dream university, we handle everything.</p>
        </div>
        
        <div class="services-grid">
            <?php
            $services = [
                ['icon'=>'fa-graduation-cap','title'=>'Admission Consultation','desc'=>'Personalized guidance to choose the right university and course that aligns with your academic goals and budget.'],
                ['icon'=>'fa-passport','title'=>'Visa Processing','desc'=>'Expert visa application support including document preparation, mock interviews, and submission guidance.'],
                ['icon'=>'fa-award','title'=>'Scholarship Guidance','desc'=>'We help you discover and apply for scholarships that make studying abroad accessible and affordable.'],
                ['icon'=>'fa-language','title'=>'IELTS Preparation','desc'=>'Comprehensive IELTS registration, mock tests, and preparation support to achieve your target band score.'],
                ['icon'=>'fa-plane-departure','title'=>'Pre-Departure Briefing','desc'=>'Complete orientation on accommodation, banking, travel, and cultural adaptation before you fly.'],
                ['icon'=>'fa-briefcase','title'=>'Career Counseling','desc'=>'Strategic career guidance to help you choose the right path for long-term professional success abroad.'],
            ];
            foreach($services as $s): ?>
            <div class="service-card">
                <div class="service-icon"><i class="fas <?=$s['icon']?>"></i></div>
                <h3><?=$s['title']?></h3>
                <p><?=$s['desc']?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- PROCESS -->
<section class="process" id="process">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">How It Works</span>
            <h2 class="section-title">Your Journey in 4 Simple Steps</h2>
            <p class="section-subtitle">We make the entire process smooth and stress-free from start to finish.</p>
        </div>
        
        <div class="process-grid">
            <div class="process-step">
                <div class="step-num">1</div>
                <h3>Free Counselling</h3>
                <p>Meet our experts to assess your goals, eligibility, and budget for studying abroad.</p>
            </div>
            <div class="process-step">
                <div class="step-num">2</div>
                <h3>University Application</h3>
                <p>We help you select the best university and handle the entire application process.</p>
            </div>
            <div class="process-step">
                <div class="step-num">3</div>
                <h3>Visa Approval</h3>
                <p>Complete visa support including documentation, mock interviews, and submission.</p>
            </div>
            <div class="process-step">
                <div class="step-num">4</div>
                <h3>Fly & Settle</h3>
                <p>Pre-departure briefing, airport assistance, and accommodation support at destination.</p>
            </div>
        </div>
    </div>
</section>

<!-- UNIVERSITIES -->
<section class="universities">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Our Partners</span>
            <h2 class="section-title">500+ Partner Universities Worldwide</h2>
        </div>
    </div>
    
    <div class="uni-track">
        <div class="uni-slider">
            <?php 
            $unis = ['University of Oxford','University of Melbourne','University of Toronto','Harvard University','University of Auckland','MIT','Cambridge','McGill University','University of Sydney','Monash University','UCL London','York University','La Trobe University','University of Alberta','University of Windsor','CQU Australia','Griffith University','University of Hull'];
            foreach(array_merge($unis,$unis) as $u): ?>
            <div class="uni-logo"><?=$u?></div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials" id="testimonials">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Student Stories</span>
            <h2 class="section-title">What Our Students Say</h2>
            <p class="section-subtitle">Hear from students who achieved their dreams through our guidance.</p>
        </div>
        
        <div class="test-slider">
            <div class="test-track">
                <div class="test-card">
                    <?php
                    $tests = [
                        ['name'=>'Samioul Hasan','uni'=>'University of Hull, UK','text'=>'Thank you for making it possible to study in the UK. The team guided me throughout the process with professionalism and dedication. Highly recommend!','init'=>'S'],
                        ['name'=>'Sadia Islam','uni'=>'University of Windsor, Canada','text'=>'I wanted to give a global direction to my career. They helped me in many aspects. Overall, it was a great experience and I am truly grateful.','init'=>'S'],
                        ['name'=>'Fariha Hossain','uni'=>'University of Bergamo, Italy','text'=>'I got awesome customer service. They know what they are doing. Straight to the point, help with forms if you need it. Amazing visa success!','init'=>'F'],
                        ['name'=>'Tawhidul Islam','uni'=>'University of Lincoln, UK','text'=>'Truly grateful for the expert support in my UK student visa process. The journey was smooth and they were always available for guidance.','init'=>'T'],
                        ['name'=>'Naziur Rahman','uni'=>'Yorkville University, Canada','text'=>'Everyone sees my photos from Canada, but not how the team made my study journey smooth and stress-free. Couldn\'t have done it without them!','init'=>'N'],
                        ['name'=>'Pranto Barman','uni'=>'University of Hertfordshire, UK','text'=>'From selecting my course to getting my visa approved, every step was handled professionally. I am now living my dream in the UK!','init'=>'P'],
                    ];
                    foreach($tests as $i=>$t): 
                        if($i>0 && $i%3==0) echo '</div><div class="test-card">'; 
                    ?>
                    <div class="test-item">
                        <div class="test-stars">★★★★★</div>
                        <p>"<?=$t['text']?>"</p>
                        <div class="test-author">
                            <div class="test-avatar"><?=$t['init']?></div>
                            <div class="test-info">
                                <h4><?=$t['name']?></h4>
                                <span><?=$t['uni']?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        
        <div class="test-nav">
            <button class="test-prev"><i class="fas fa-chevron-left"></i></button>
            <button class="test-next"><i class="fas fa-chevron-right"></i></button>
        </div>
    </div>
</section>

<!-- SCHOLARSHIPS -->
<section class="scholarships" id="scholarships">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Financial Aid</span>
            <h2 class="section-title">Scholarship & Funding Opportunities</h2>
            <p class="section-subtitle">Discover ways to fund your studies with various scholarships available for international students.</p>
        </div>
        
        <div class="scholar-grid">
            <div class="scholar-card">
                <div class="scholar-icon">🏛️</div>
                <h3>Country-Specific Scholarships</h3>
                <p>Government-funded scholarships from UK, Australia, Canada, and other countries specifically for Bangladeshi students.</p>
            </div>
            <div class="scholar-card">
                <div class="scholar-icon">🏆</div>
                <h3>Merit-Based Scholarships</h3>
                <p>Awards for outstanding academic performance and extracurricular achievements from partner universities worldwide.</p>
            </div>
            <div class="scholar-card">
                <div class="scholar-icon">🎓</div>
                <h3>Fully Funded Scholarships</h3>
                <p>Secure your studies with scholarships that cover full tuition, living expenses, and travel costs for deserving students.</p>
            </div>
        </div>
    </div>
</section>

<!-- EVENTS -->
<section class="events" id="events">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Upcoming Events</span>
            <h2 class="section-title">Meet Us at Our Next Event</h2>
            <p class="section-subtitle">Join our education expos, spot assessments, and counselling sessions.</p>
        </div>
        
        <div class="events-grid">
            <div class="event-card">
                <div class="event-date-bar">
                    <span class="day">15</span>
                    <span class="month-year">May<br>2026</span>
                </div>
                <div class="event-body">
                    <h3>Multi-Destination Education Expo – Dhaka</h3>
                    <p>Meet representatives from top UK, Australia & Malaysia universities. Free entry!</p>
                    <a href="#contact" class="btn btn-primary">Register Now</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-date-bar">
                    <span class="day">22</span>
                    <span class="month-year">May<br>2026</span>
                </div>
                <div class="event-body">
                    <h3>UK University Spot Assessment Day</h3>
                    <p>Get on-the-spot offers from leading UK universities. Bring your documents!</p>
                    <a href="#contact" class="btn btn-primary">Register Now</a>
                </div>
            </div>
            <div class="event-card">
                <div class="event-date-bar">
                    <span class="day">01</span>
                    <span class="month-year">Jun<br>2026</span>
                </div>
                <div class="event-body">
                    <h3>Scholarship Guidance Seminar</h3>
                    <p>Learn how to secure scholarships for UK, Australia, Malaysia & South Korea.</p>
                    <a href="#contact" class="btn btn-primary">Register Now</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BLOG -->
<section class="blog" id="blog">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">Latest Insights</span>
            <h2 class="section-title">News & Blog</h2>
            <p class="section-subtitle">Expert advice, trends, and guides to help you make informed decisions.</p>
        </div>
        
        <div class="blog-grid">
            <div class="blog-card">
                <div class="blog-img">
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80" alt="Blog">
                </div>
                <div class="blog-body">
                    <span class="blog-tag">Study in UK</span>
                    <h3>Cost of Living in UK for Bangladeshi Students: Complete Guide 2026</h3>
                    <p>Everything you need to know about accommodation, food, transport, and other living costs in the UK...</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> May 2, 2026</span>
                        <span><i class="far fa-clock"></i> 5 min read</span>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <div class="blog-img">
                    <img src="https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&q=80" alt="Blog">
                </div>
                <div class="blog-body">
                    <span class="blog-tag">Australia</span>
                    <h3>Top 10 Universities in Australia 2026 – Rankings & Student Guide</h3>
                    <p>Discover the best Australian universities, rankings, programs, tuition, and admission tips...</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> Apr 29, 2026</span>
                        <span><i class="far fa-clock"></i> 7 min read</span>
                    </div>
                </div>
            </div>
            <div class="blog-card">
                <div class="blog-img">
                    <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80" alt="Blog">
                </div>
                <div class="blog-body">
                    <span class="blog-tag">Visa Guide</span>
                    <h3>How to Justify Your Study Gap and Get a Visa in 2026</h3>
                    <p>Worried about your study gap? Learn how to address it in your visa application with confidence...</p>
                    <div class="blog-meta">
                        <span><i class="far fa-calendar"></i> Apr 15, 2026</span>
                        <span><i class="far fa-clock"></i> 4 min read</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FAQ -->
<section class="faq" id="faq">
    <div class="container">
        <div class="text-center">
            <span class="section-tag">FAQ</span>
            <h2 class="section-title">Frequently Asked Questions</h2>
            <p class="section-subtitle">Find answers to common questions about studying abroad.</p>
        </div>
        
        <div class="faq-list">
            <?php
            $faqs = [
                ['q'=>'Am I eligible to study abroad?','a'=>'If you want to study abroad, you must meet academic requirements, language requirements (IELTS/TOEFL), and financial requirements. Our expert counsellors will assess your profile for free and guide you on the best options.'],
                ['q'=>'Can I apply without IELTS?','a'=>'Some universities accept alternative English tests or offer conditional admissions. However, we recommend taking IELTS as it strengthens your visa application. Our team can guide you on IELTS-free options.'],
                ['q'=>'How much does it cost to study abroad?','a'=>'Costs vary by country. UK tuition starts from £10,000/year, Australia from AUD 20,000/year, Malaysia from USD 4,000/year. Many universities offer scholarships. Our counsellors will help you find affordable options.'],
                ['q'=>'What is the visa success rate?','a'=>'Our visa success rate is over 96%. We provide thorough documentation support, mock interviews, and ensure your application meets all requirements for maximum chances of approval.'],
                ['q'=>'Do you charge for consultation?','a'=>'No! Initial consultation and eligibility assessment are completely FREE. We believe every student deserves access to quality guidance without financial barriers.'],
                ['q'=>'How long does the admission process take?','a'=>'Typically 2-8 weeks depending on the university and country. Some universities offer spot assessments at our events where you can get offers on the same day.'],
            ];
            foreach($faqs as $f): ?>
            <div class="faq-item">
                <div class="faq-q">
                    <span><?=$f['q']?></span>
                    <span class="icon"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div class="faq-a">
                    <div class="faq-a-inner"><?=$f['a']?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="container">
        <h2>Ready to Start Your Journey?</h2>
        <p>Book a free consultation with our expert counsellors and take the first step towards your dream university.</p>
        <a href="#contact" class="btn btn-primary" style="font-size:1.05rem;padding:16px 40px">
            <i class="fas fa-calendar-check"></i> Book FREE Consultation
        </a>
    </div>
</section>

<!-- CONTACT -->
<section class="contact" id="contact">
    <div class="container">
        <div class="contact-grid">
            <div class="contact-form">
                <h2 style="margin-bottom:8px">Register With Us</h2>
                <p style="color:var(--text-light);margin-bottom:24px;font-size:.9rem">Fill out the form and our counsellor will contact you within 24 hours.</p>
                
                <form>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Full Name *</label>
                            <input type="text" placeholder="Your full name" required>
                        </div>
                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="tel" placeholder="+880 1XXX-XXXXXX" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Email *</label>
                        <input type="email" placeholder="your@email.com" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label>Preferred Country</label>
                            <select>
                                <option>Select Country</option>
                                <option>UK</option>
                                <option>Australia</option>
                                <option>Malaysia</option>
                                <option>South Korea</option>
                                <option>Cyprus</option>
                                <option>Malta</option>
                                <option>Russia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Study Level</label>
                            <select>
                                <option>Select Level</option>
                                <option>Bachelor's</option>
                                <option>Master's</option>
                                <option>PhD</option>
                                <option>Diploma</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Message</label>
                        <textarea placeholder="Tell us about your study plans..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%;justify-content:center">
                        <i class="fas fa-paper-plane"></i> Submit Application
                    </button>
                </form>
            </div>
            
            <div class="contact-info">
                <span class="section-tag">Get In Touch</span>
                <h2 class="section-title" style="font-size:1.8rem">Let's Start Your Journey</h2>
                <p>Visit us at any of our offices or reach out online. We're here to help you every step of the way.</p>
                
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h4>Dhanmondi Office</h4>
                        <p>Level 5, Road 27, Dhanmondi, Dhaka 1209</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <h4>Banani Office</h4>
                        <p>House 50, Block C, Road 11, Banani, Dhaka 1213</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-phone"></i></div>
                    <div>
                        <h4>Phone</h4>
                        <p>+880 1XXX-XXXXXX</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-envelope"></i></div>
                    <div>
                        <h4>Email</h4>
                        <p>info@eduglobal.com</p>
                    </div>
                </div>
                <div class="info-item">
                    <div class="info-icon"><i class="fas fa-clock"></i></div>
                    <div>
                        <h4>Working Hours</h4>
                        <p>Saturday - Thursday: 10 AM - 6:30 PM</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-about">
                <div class="logo" style="margin-bottom:16px">
                    <img src="images/logo.jpg" alt="Denova Education" class="logo-img">
                    <div class="logo-text">Denova<span>Education</span></div>
                </div>
                <p>Denova Education is a leading study abroad agency in Bangladesh, guiding students toward a better life abroad through expert higher education consultancy since 2006.</p>
                <div class="footer-socials">
                    <a href="https://www.facebook.com/DenovaEducation"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fab fa-youtube"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                </div>
            </div>
            
            <div class="footer-links">
                <h4>Study Destinations</h4>
                <a href="#">🇬🇧 United Kingdom</a>
                <a href="#">🇦🇺 Australia</a>
                <a href="#">🇲🇾 Malaysia</a>
                <a href="#">🇰🇷 South Korea</a>
                <a href="#">🇨🇾 Cyprus</a>
                <a href="#">🇲🇹 Malta</a>
                <a href="#">🇷🇺 Russia</a>
            </div>
            
            <div class="footer-links">
                <h4>Quick Links</h4>
                <a href="#about">About Us</a>
                <a href="#services">Our Services</a>
                <a href="#scholarships">Scholarships</a>
                <a href="#blog">Blog</a>
                <a href="#events">Events</a>
                <a href="#faq">FAQ</a>
                <a href="#contact">Contact Us</a>
            </div>
            
            <div class="footer-contact">
                <h4>Head Office</h4>
                <div class="item"><span>📍</span><span>Dhanmondi, Road 27, Dhaka 1209, Bangladesh</span></div>
                <div class="item"><span>📞</span><span>+880 1XXX-XXXXXX</span></div>
                <div class="item"><span>✉️</span><span>info@eduglobal.com</span></div>
                <div class="item"><span>🕐</span><span>Sat-Thu: 10AM - 6:30PM</span></div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>&copy; 2026 Denova Education. All Rights Reserved.</p>
        </div>
    </div>
</footer>

<!-- WHATSAPP FLOAT -->
<a href="https://wa.me/8801XXXXXXXXX?text=Hi! I'd like to know about studying abroad." class="whatsapp-float" target="_blank">
    <i class="fab fa-whatsapp"></i>
</a>
