<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destination;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Event;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@denova.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@denova.com',
                'password' => Hash::make('password123'),
            ]
        );

        // Destinations — with country_code & slug for flag images and detail pages
        $destinations = [
            [
                'name' => 'United Kingdom', 'flag' => '🇬🇧', 'country_code' => 'gb', 'slug' => 'united-kingdom',
                'description' => 'World-class education with post-study work opportunities and rich cultural heritage.',
                'details' => 'The United Kingdom is home to some of the world\'s most prestigious universities including Oxford, Cambridge, and UCL. With a Graduate Route visa allowing 2 years of post-study work, UK remains the top destination for Bangladeshi students. Tuition fees start from £10,000/year and living costs average £12,000/year. Popular cities include London, Manchester, Birmingham, and Leeds.',
                'image_url' => 'https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=600&q=80', 'order' => 1,
            ],
            [
                'name' => 'Australia', 'flag' => '🇦🇺', 'country_code' => 'au', 'slug' => 'australia',
                'description' => '1,100+ institutions with world-class education and outstanding lifestyle experience.',
                'details' => 'Australia offers high-quality education with 43 universities ranked globally. The Temporary Graduate visa allows 2-4 years of post-study work depending on your qualification level. Tuition fees range from AUD 20,000–45,000/year. Top cities include Sydney, Melbourne, Brisbane, and Perth. Australia is known for its multicultural environment and high standard of living.',
                'image_url' => 'https://images.unsplash.com/photo-1506973035872-a4ec16b8e8d9?w=600&q=80', 'order' => 2,
            ],
            [
                'name' => 'New Zealand', 'flag' => '🇳🇿', 'country_code' => 'nz', 'slug' => 'new-zealand',
                'description' => 'High-quality education, safe environment, and incredible natural beauty with great work opportunities.',
                'details' => 'New Zealand is ranked among the safest countries in the world with 8 universities and numerous polytechnics. Post-study work visas allow up to 3 years of work after graduation. Tuition fees range from NZD 22,000–35,000/year. Auckland, Wellington, and Christchurch are the main study destinations. Students can work up to 20 hours per week during studies.',
                'image_url' => 'https://images.unsplash.com/photo-1472791108553-c9405341e398?w=600&q=80', 'order' => 3,
            ],
            [
                'name' => 'Malaysia', 'flag' => '🇲🇾', 'country_code' => 'my', 'slug' => 'malaysia',
                'description' => 'Budget-friendly education with multicultural campus life in Southeast Asia.',
                'details' => 'Malaysia is one of the most affordable study destinations in Asia with over 20 public and 40 private universities. Many UK, Australian, and US universities have branch campuses in Malaysia. Tuition fees start from USD 4,000/year with living costs around USD 5,000/year. Kuala Lumpur is the main education hub with excellent transport and facilities.',
                'image_url' => 'https://images.unsplash.com/photo-1596422846543-75c6fc197f07?w=600&q=80', 'order' => 4,
            ],
            [
                'name' => 'South Korea', 'flag' => '🇰🇷', 'country_code' => 'kr', 'slug' => 'south-korea',
                'description' => 'Innovative technology, rich culture, and high-quality education in East Asia.',
                'details' => 'South Korea is a global leader in technology and innovation with world-class universities like KAIST, POSTECH, and Seoul National University. The Korean government offers generous GKS (Global Korea Scholarship) fully funded scholarships. Tuition fees range from KRW 3–8 million/year. Seoul, Busan, and Daejeon are major study cities. Korea is known for its K-culture, excellent food, and safety.',
                'image_url' => 'https://images.unsplash.com/photo-1517154421773-0529f29ea451?w=600&q=80', 'order' => 5,
            ],
            [
                'name' => 'Cyprus', 'flag' => '🇨🇾', 'country_code' => 'cy', 'slug' => 'cyprus',
                'description' => 'Mediterranean charm with affordable high-quality European degree programs.',
                'details' => 'Cyprus is an EU member state offering European-standard degrees at very affordable prices. The University of Cyprus and Cyprus International University are popular choices. Tuition fees range from €3,000–8,000/year with living costs around €6,000/year. Nicosia and Limassol are the main cities. Cyprus\'s strategic location between Europe, Asia, and Africa makes it an excellent hub.',
                'image_url' => 'https://images.unsplash.com/photo-1518459031867-a89b944bffe4?w=600&q=80', 'order' => 6,
            ],
            [
                'name' => 'Malta', 'flag' => '🇲🇹', 'country_code' => 'mt', 'slug' => 'malta',
                'description' => 'English-speaking island nation with great weather and affordable tuition.',
                'details' => 'Malta is the smallest EU member state and one of the few English-speaking countries in the European Union. The University of Malta offers internationally recognized degrees. Tuition fees range from €9,000–12,000/year. Malta\'s Mediterranean climate, rich history, and friendly locals make it a unique study destination. Students enjoy excellent work opportunities in finance, gaming, and tech sectors.',
                'image_url' => 'https://images.unsplash.com/photo-1527838832700-5059252407fa?w=600&q=80', 'order' => 7,
            ],
            [
                'name' => 'Russia', 'flag' => '🇷🇺', 'country_code' => 'ru', 'slug' => 'russia',
                'description' => 'Deep academic traditions and cutting-edge research in science and arts.',
                'details' => 'Russia has over 700 state-accredited universities and is particularly strong in engineering, medicine, science, and arts. Moscow State University and Saint Petersburg University are world-renowned. Tuition fees are very affordable at USD 2,000–5,000/year. The Russian government offers scholarships through Rossotrudnichestvo for international students. Russia\'s diverse culture and rich history offer a unique educational experience.',
                'image_url' => 'https://images.unsplash.com/photo-1513326738677-b964603b136d?w=600&q=80', 'order' => 8,
            ],
        ];
        foreach ($destinations as $d) {
            Destination::updateOrCreate(['slug' => $d['slug']], $d);
        }

        // Services
        $services = [
            ['icon' => 'fa-graduation-cap', 'title' => 'Admission Consultation', 'description' => 'Personalized guidance to choose the right university and course that aligns with your academic goals and budget.', 'order' => 1],
            ['icon' => 'fa-passport',       'title' => 'Visa Processing',         'description' => 'Expert visa application support including document preparation, mock interviews, and submission guidance.',         'order' => 2],
            ['icon' => 'fa-award',          'title' => 'Scholarship Guidance',    'description' => 'We help you discover and apply for scholarships that make studying abroad accessible and affordable.',             'order' => 3],
            ['icon' => 'fa-language',       'title' => 'IELTS Preparation',       'description' => 'Comprehensive IELTS registration, mock tests, and preparation support to achieve your target band score.',         'order' => 4],
            ['icon' => 'fa-plane-departure','title' => 'Pre-Departure Briefing',  'description' => 'Complete orientation on accommodation, banking, travel, and cultural adaptation before you fly.',                  'order' => 5],
            ['icon' => 'fa-briefcase',      'title' => 'Career Counseling',       'description' => 'Strategic career guidance to help you choose the right path for long-term professional success abroad.',           'order' => 6],
        ];
        foreach ($services as $s) {
            Service::updateOrCreate(['title' => $s['title']], $s);
        }

        // Testimonials
        $tests = [
            ['name' => 'Samioul Hasan',  'university' => 'University of Hull, UK',          'text' => 'Thank you for making it possible to study in the UK. The team guided me throughout the process with professionalism and dedication. Highly recommend!', 'initial' => 'S', 'order' => 1],
            ['name' => 'Sadia Islam',    'university' => 'University of Windsor, Canada',    'text' => 'I wanted to give a global direction to my career. They helped me in many aspects. Overall, it was a great experience and I am truly grateful.',         'initial' => 'S', 'order' => 2],
            ['name' => 'Fariha Hossain', 'university' => 'University of Bergamo, Italy',    'text' => 'I got awesome customer service. They know what they are doing. Straight to the point, help with forms if you need it. Amazing visa success!',            'initial' => 'F', 'order' => 3],
            ['name' => 'Tawhidul Islam', 'university' => 'University of Lincoln, UK',       'text' => 'Truly grateful for the expert support in my UK student visa process. The journey was smooth and they were always available for guidance.',                'initial' => 'T', 'order' => 4],
            ['name' => 'Naziur Rahman',  'university' => 'Yorkville University, Canada',    'text' => "Everyone sees my photos from Canada, but not how the team made my study journey smooth and stress-free. Couldn't have done it without them!",            'initial' => 'N', 'order' => 5],
            ['name' => 'Pranto Barman',  'university' => 'University of Hertfordshire, UK', 'text' => 'From selecting my course to getting my visa approved, every step was handled professionally. I am now living my dream in the UK!',                       'initial' => 'P', 'order' => 6],
        ];
        foreach ($tests as $t) {
            Testimonial::updateOrCreate(['name' => $t['name']], $t);
        }

        // Events
        $events = [
            ['title' => 'Multi-Destination Education Expo – Dhaka',  'description' => 'Meet representatives from top UK, Australia & Malaysia universities. Free entry!',      'event_date' => '2026-05-15'],
            ['title' => 'UK University Spot Assessment Day',          'description' => 'Get on-the-spot offers from leading UK universities. Bring your documents!',            'event_date' => '2026-05-22'],
            ['title' => 'Scholarship Guidance Seminar',               'description' => 'Learn how to secure scholarships for UK, Australia, Malaysia & South Korea.',          'event_date' => '2026-06-01'],
        ];
        foreach ($events as $e) {
            Event::updateOrCreate(['title' => $e['title']], $e);
        }

        // Blog Posts
        $blogs = [
            ['title' => 'Cost of Living in UK for Bangladeshi Students: Complete Guide 2026',  'slug' => 'cost-of-living-uk-2026',      'excerpt' => 'Everything you need to know about accommodation, food, transport, and other living costs in the UK.', 'content' => '<p>Studying in the UK is a dream for many Bangladeshi students. Understanding the costs involved is crucial for planning your finances effectively.</p><h2>Accommodation</h2><p>University halls of residence typically cost £400–£700/month. Private accommodation ranges from £500–£900/month depending on the city. London is the most expensive, while cities like Hull, Bradford, and Coventry are much more affordable.</p><h2>Food & Groceries</h2><p>Monthly food expenses range from £150–£250. Cooking at home is the most budget-friendly option. Many Asian grocery stores are available in major cities.</p><h2>Transport</h2><p>A monthly student bus/rail pass costs £50–£100. Many students use bicycles to save money. London\'s Oyster card offers student discounts.</p>', 'image_url' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?w=600&q=80', 'tag' => 'Study in UK',  'read_time' => 5, 'published_at' => '2026-05-02 00:00:00'],
            ['title' => 'Top 10 Universities in Australia 2026 – Rankings & Student Guide',    'slug' => 'top-universities-australia',   'excerpt' => 'Discover the best Australian universities, rankings, programs, tuition, and admission tips.', 'content' => '<p>Australia is home to some of the world\'s finest universities. Here are the top institutions for international students in 2026.</p><h2>1. University of Melbourne</h2><p>Ranked #33 globally, Melbourne offers exceptional research programs and a vibrant student life. Located in Australia\'s cultural capital.</p><h2>2. University of Sydney</h2><p>One of Australia\'s oldest universities with a strong global reputation. Excellent programs in medicine, law, and business.</p><h2>3. Australian National University (ANU)</h2><p>Located in Canberra, ANU is ranked #30 globally and offers outstanding research opportunities particularly in sciences and public policy.</p>', 'image_url' => 'https://images.unsplash.com/photo-1523240795612-9a054b0db644?w=600&q=80', 'tag' => 'Australia',    'read_time' => 7, 'published_at' => '2026-04-29 00:00:00'],
            ['title' => 'How to Justify Your Study Gap and Get a Visa in 2026',                'slug' => 'justify-study-gap-visa-2026',  'excerpt' => 'Worried about your study gap? Learn how to address it in your visa application with confidence.', 'content' => '<p>A study gap can be a concern when applying for a student visa, but it doesn\'t have to be a deal-breaker. Here\'s how to handle it professionally.</p><h2>What Counts as a Study Gap?</h2><p>Any period of more than 12 months between completing one level of education and starting another is generally considered a study gap.</p><h2>Valid Reasons for Gap</h2><ul><li>Financial hardship</li><li>Family responsibilities</li><li>Medical reasons</li><li>Work experience</li><li>Preparing for language tests</li></ul><h2>How to Explain</h2><p>Be honest and positive. Explain what you did during the gap and how it has prepared you for university. A well-written Statement of Purpose (SOP) is key.</p>', 'image_url' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=600&q=80', 'tag' => 'Visa Guide',   'read_time' => 4, 'published_at' => '2026-04-15 00:00:00'],
        ];
        foreach ($blogs as $b) {
            BlogPost::updateOrCreate(['slug' => $b['slug']], $b);
        }

        // FAQs
        $faqs = [
            ['question' => 'Am I eligible to study abroad?',              'answer' => 'If you want to study abroad, you must meet academic requirements, language requirements (IELTS/TOEFL), and financial requirements. Our expert counsellors will assess your profile for free and guide you on the best options.', 'order' => 1],
            ['question' => 'Can I apply without IELTS?',                  'answer' => 'Some universities accept alternative English tests or offer conditional admissions. However, we recommend taking IELTS as it strengthens your visa application. Our team can guide you on IELTS-free options.',                   'order' => 2],
            ['question' => 'How much does it cost to study abroad?',      'answer' => 'Costs vary by country. UK tuition starts from £10,000/year, Australia from AUD 20,000/year, Malaysia from USD 4,000/year. Many universities offer scholarships. Our counsellors will help you find affordable options.',          'order' => 3],
            ['question' => 'What is the visa success rate?',              'answer' => 'Our visa success rate is over 96%. We provide thorough documentation support, mock interviews, and ensure your application meets all requirements for maximum chances of approval.',                                                 'order' => 4],
            ['question' => 'Do you charge for consultation?',             'answer' => 'No! Initial consultation and eligibility assessment are completely FREE. We believe every student deserves access to quality guidance without financial barriers.',                                                                   'order' => 5],
            ['question' => 'How long does the admission process take?',   'answer' => 'Typically 2-8 weeks depending on the university and country. Some universities offer spot assessments at our events where you can get offers on the same day.',                                                                      'order' => 6],
        ];
        foreach ($faqs as $f) {
            Faq::updateOrCreate(['question' => $f['question']], $f);
        }

        // Settings
        $settings = [
            'phone'   => '+880 1339-883805',
            'email'   => 'info@denovaeducation.com',
            'address' => '21/4/A, Zigatola, Dhanmondi, Dhaka, Bangladesh, 1209',
            'hours'   => 'Saturday - Thursday: 10 AM - 6:30 PM',
            'facebook'  => 'https://www.facebook.com/DenovaEducation',
            'instagram' => 'https://www.instagram.com/denovaeducation',
            'whatsapp'  => 'https://wa.me/8801339883805',
        ];
        foreach ($settings as $key => $value) {
            Setting::set($key, $value);
        }
    }
}
