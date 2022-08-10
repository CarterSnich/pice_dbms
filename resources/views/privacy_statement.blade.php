@extends('layouts.public_layout')

@section('title', 'Privacy Statement | Philippine Institute of Civil Enginerring')

@section('style')
    <style>
        .accordion-item {
            border-bottom: 1px solid whitesmoke;
        }

        .accordion-header {
            margin-block: 0;
        }

        .accordion-button {
            margin-block: 0;
            color: #fff !important;
            background-color: #161f27 !important;
            border: none;
            border-radius: 6px;
            outline: none;
        }

        .accordion-button::after {
            mix-blend-mode: exclusion;
        }

        #privacy-statement {
            padding: 5.25rem 3.25rem;
        }

        #privacy-statement p,
        #privacy-statement ol,
        #privacy-statement ul {
            margin-bottom: .5rem !important;
        }

        #privacy-statement>div {
            width: 50%;
            margin-inline: auto;
        }
    </style>
@endsection


@section('content')
    {{-- some random banner or whatnot --}}
    <div class="page-banner">
        <img src="{{ asset('images/CONTACT-1536x240.png') }}" alt="">
    </div>

    {{-- wrapper --}}
    <div id="privacy-statement">
        <div class="accordion accordion-flush" id="accordionFlushExample">

            {{-- privacy concerns and inquiries --}}
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-content-1" aria-expanded="true" aria-controls="flush-collapseOne">
                        Privacy Concerns and Inquiries
                    </button>
                </h2>
                <div id="accordion-content-1" class="accordion-collapse collapse show" aria-labelledby="flush-headingOne">
                    <div class="accordion-body">
                        <p>If you have concerns, queries and clarifications regarding our privacy notice, you may contact:</p>
                        <p>PICE DATA PROTECTION OFFICER</p>
                        <p>Phone: <a href="tel:0283981434">02-8398-1434</a></p>
                        <p>Mobile: <a href="tel:09270432629">0927-043-2629</a></p>
                        <p>Email: <a href="mailto:dataprotection@pice.org.ph">dataprotection@pice.org.ph</a></p>
                        <p>Postal Address: PICE National Office</p>
                        <p>Unit 703, 7/F Futurepoint Plaza 1 Condominium,112 Panay Avenue, Quezon City</p>
                    </div>
                </div>
            </div>

            {{-- pice privacy statement --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-content-2" aria-expanded="true" aria-controls="flush-collapseTwo">
                        PICE PRIVACY STATEMENT
                    </button>
                </h2>
                <div id="accordion-content-2" class="accordion-collapse collapse show" aria-labelledby="flush-headingTwo">
                    <div class="accordion-body">
                        <h4>Statement of Policy</h4>
                        <p>The Philippine Institute of Civil Engineers (PICE) respects and values data privacy rights, and pledges that all personal information collected from our members, clients and customers, business partners, employees, and personnel are processed in accordance with Republic Act No. 10173 or the Data Privacy Act of 2012 (DPA), its Implementing Rules and Regulations, and other relevant policies, including issuances of the National Privacy Commission.</p>

                        <h4>Privacy Notice</h4>
                        <ol>
                            <li>
                                <h5>Personal Data Collected</h5>
                                <p>We only collect personal information which are voluntarily submitted by our visitors. We collect the following personal information from you when you manually or electronically submit to us your inquiries or requests:</p>
                                <ul>
                                    <li>Full name</li>
                                    <li>Contact information, preferably cell phone number and email address</li>
                                </ul>
                            </li>
                            <li>
                                <h5>Use</h5>
                                <p>The website itself does not collect personal data that would identify a specific individual. The collected personal information is utilized solely for documentation and processing purposes within the PICE and is not shared with any outside parties. They enable the PICE to properly address the inquiries and requests, forward them to appropriate internal units for action and response, and provide clients with appropriate updates and advisories in a legitimate format and in an orderly and timely manner.</p>
                            </li>
                            <li>
                                <h5>Your rights to your Personal Data</h5>
                                <p>You are afforded certain rights under the Privacy Laws, particularly the DPA. You have the right to be informed of these specific rights, to object to the processing of your Personal Information, to access, update and correct the same, and to withdraw your consent and/or edit your consent preferences at any time. Hence, we would like to ensure that we have your consent to continue to collect, use, and disclose your Personal Data for the purposes identified in this Statement.</p>
                                <p>If you wish to have access to your Personal Data in our records, or you think that it is incomplete, not up-to-date or otherwise inaccurate, or have any queries or complaints about our Privacy Policy, you may get in touch with our Data Protection Officer through the contact details provided.</p>
                                <p>Your rights to your personal information are provided in Chapter IV of the DPA which you may access on this web address: <a href="https://privacy.gov.ph/data-privacy-act/" target="_blank">https://privacy.gov.ph/data-privacy-act/</a>.</p>
                            </li>
                            <li>
                                <h5>Protection Measures</h5>
                                <p>Your personal or sensitive personal information shall be retained only for such period as necessary to serve the purpose for which it was collected, or as required under any contract or by any law, rule or regulation. Thereafter, it shall be disposed in a secure manner that would prevent further processing, unauthorized access or disclosure to any other party.</p>
                            </li>
                            <li>
                                <h5>Access and Correction</h5>
                                <p>You have the right to ask for a copy of any personal information we hold about you, as well as to ask for it to be corrected if you think it is wrong. To do so, please contact our Data Protection Officer, through the following email address: <a href="mailto:dataprotection@pice.org.ph">dataprotection@pice.org.ph</a>.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- cookie policy --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#accordion-content-3" aria-expanded="true" aria-controls="flush-collapseThree">
                        COOKIE POLICY
                    </button>
                </h2>
                <div id="accordion-content-3" class="accordion-collapse collapse show" aria-labelledby="flush-headingThree">
                    <div class="accordion-body">
                        <h4>Statement of Policy</h4>
                        <p>The Philippine Institute of Civil Engineers (PICE) respects and values data privacy rights, and pledges that all personal information collected from our members, clients and customers, business partners, employees, and personnel are processed in accordance with Republic Act No. 10173 or the Data Privacy Act of 2012 (DPA), its Implementing Rules and Regulations, and other relevant policies, including issuances of the National Privacy Commission.</p>
                        <h4>Cookie Policy</h4>

                        <ol>
                            <li>
                                <h5>What Are Cookies</h5>
                                <p>Cookies are text files placed on your computer to collect standard Internet log information and visitor behavior information. These are downloaded to your computer, to improve user experience. This page describes what information PICE gather, how such information is used and why PICE need to store these cookies.</p>
                                <p>To allow users to exercise their right to object, PICE will also share how users can prevent these cookies from being stored. However, this may downgrade or ‘break’ certain elements of the sites functionality.</p>
                                <p>The PICE uses cookies to analyze the web traffic data for us. Data generated is not shared with any other party. The following web traffic data are analyzed:</p>
                                <ul>
                                    <li>Your IP address</li>
                                    <li>The search terms you used</li>
                                    <li>The pages and internal links accessed on our site</li>
                                    <li>The date and time you visited the site</li>
                                    <li>Geolocation</li>
                                    <li>The referring site or platform (if any) through which you clicked through to this site</li>
                                    <li>Your operating system</li>
                                    <li>Web browser type</li>
                                </ul>
                                <p>In most instances, this information, by itself, is not sufficient to determine your identity.</p>
                            </li>
                            <li>
                                <h5>How We Use Cookies</h5>
                                <p>We use cookies for a variety of reasons detailed below. Unfortunately, in most cases there are no industry standard options for disabling cookies without completely disabling the functionality and features they add to this site. It is recommended that you leave on all cookies if you are not sure whether you need them or not in case they are used to provide a service that you use.</p>
                            </li>
                            <li>
                                <h5>How to manage or disable Cookies</h5>
                                <p>You can prevent the setting of cookies by adjusting the settings on your browser (see your browser Help on how to do this). Be aware that disabling cookies will affect the functionality of this and many other websites that you visit. Disabling cookies will usually result in also disabling certain functionality and features of PICE website. Therefore, it is recommended not to disable cookies.</p>
                            </li>
                            <li>
                                <h5>Login related cookies</h5>
                                <p>We use cookies when you are logged in so that we can remember this fact. This prevents you from having to log in every single time you visit a new page. These cookies are typically removed or cleared when you log out to ensure that you can only access restricted features and areas when logged in. Log in related cookies are collected by using/logging in credentials to your Membership Portal.</p>
                            </li>
                            <li>
                                <h5>Third Party Cookies</h5>
                                <p>In some special cases we also use cookies provided by trusted third parties. The following section details which third party cookies you might encounter through this site.</p>
                                <p>We also use social media buttons and/or plugins on this site that allow you to connect with your social network in various ways. For these to work, the social media sites including Facebook, will set cookies through our site which may be used to enhance your profile on their site or contribute to the data they hold for various purposes outlined in their respective privacy policies.</p>
                                <p>If you have any questions about this Notice, you may contact the PICE Data Protection Officer.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

            {{-- terms of use --}}
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#accordion-content-4" aria-expanded="true" aria-controls="flush-collapseThree">
                        TERMS OF USE
                    </button>
                </h2>
                <div id="accordion-content-4" class="accordion-collapse collapse show" aria-labelledby="flush-headingThree">
                    <div class="accordion-body">
                        <p>These terms and conditions (Terms of Use) constitute legally binding agreement made between you (“you”, “your”) and Philippine Institute of Civil Engineers, Inc. (the “PICE”, “Organization”, “we”, “us”, or “our”), concerning your access to and use of this website, as well as any features or services we may provide through this website (collectively, the “Site”). You agree that by using the Site, you have read, understood, and agree to be bound by all of these Terms of Use. If you do not agree with (or cannot comply with) the Terms of Use, then you may not access or use the Site.</p>
                        <p>You represent and warrant that you are of minimum legal age or a t least 18 years if age, and have the legal capacity and authority to bind yourself to these Terms of Use and agree to be bound by the terms hereof.</p>
                        <p>The PICE reserves the right to deny or revoke access to the Site or any part thereof, to any person, at any time in its sole discretion, with or without cause. The PICE may report to law enforcement authorities any action that may be illegal, and any report it receives of such conduct. When legally required, the PICE will cooperate with regulatory, judicial, or law enforcement agencies in any investigation of alleged illegal activity conducted or carried out in accessing the Site or through the use of the Site.</p>
                        <ol type="I">
                            <li>
                                <h5>Acceptance of Terms of Use</h5>
                                <p>These Terms of Use set out legally binding terms of your use and access to the Site. By using this Site, you acknowledge that you have read and understood, and you accept and agree to be bound by the terms, conditions, notices contained or referenced in this Terms of Use.</p>
                            </li>
                            <li>
                                <h5> Access and Use of This Site</h5>
                                <p>You will access and use the Site only for legitimate and lawful purposes, and in accordance with these Terms of Use, including the Privacy Policy as defined, and you will ensure that any information you provide to us in accessing the Site or through using the Site is true, accurate, current, and complete.</p>
                            </li>
                            <li>
                                <h5>Changes to the Terms of Use</h5>
                                <p>Supplemental terms and conditions and/or documents to these Terms of Use shall be posted on the Site from time to time are hereby expressly incorporated herein by reference. The PICE reserves the right, in our sole discretion, to amend these Terms of Use at any time and for any reason. All changes shall take effect seven (7) days after the date on which this Terms of Use is posted. If you do not agree with any aspect of amended Terms of Use, you must immediately cease accessing or using our Site or any of the relevant services available in the website.</p>
                            </li>
                            <li>
                                <h5>Intellectual Property</h5>
                                <p>The Site and all proprietary and intellectual property rights therein are and shall be owned by the PICE. All rights reserved.</p>
                            </li>
                            <li>
                                <h5>Data Property</h5>
                                <p>The PICE’s Data Privacy Notice (the Privacy Notice), as may be amended from time to time and may be accessed through the Site, is hereby incorporated by reference to these Terms of Use. The Privacy Notice explains how we process and use your personal information in accessing and using the Site and availing of our services. The PICE takes utmost care to prevent any unauthorized processing, disclosure and all other compromise of your personal information. Your personal information may be disclosed only by the PICE in cases specifically provided by law or upon your request, or if the same is necessary to comply with a legal. Statutory, or investigative law enforcement requirements, or as otherwise provided in our PICE Data Privacy Manual.</p>
                            </li>
                            <li>
                                <h5>Term and Termination</h5>
                                <p>The Terms of Use take full force and effect on the date on which you commence accessing or using the Site, whichever is earlier, and shall continue unless your access or use of the Site is terminated or restricted in accordance with the Terms of Use. We reserve the right to terminate or restrict your access to or use of the Site at any time and for any reason.</p>
                            </li>
                            <li>
                                <h5>Force Majeure</h5>
                                <p>We shall not be responsible for damages, delays, or non-performance of the Site resulting from acts or occurrences beyond our reasonable control, including, but not limited to, fire, lightning, explosion, power or surge or failure, flood, typhoon, acts of God, epidemic, pandemic, government, government-imposed quarantines, war, revolution, civil commotion or acts of civil or military authorities or public enemies; any law, order, regulation, ordinance or requirement of any government or legal body or any representative of any such government or legal body; or labor unrest, including, without limitation, strikes, slowdowns, picketing, or boycotts; inability to secure raw materials. Transportation facilities, fuel or energy shortages, or acts or omissions of other common carriers.</p>
                            </li>
                            <li>
                                <h5>Third-Party Sites</h5>
                                <p>The Sites may include links to other websites that are not owned by the PICE (“Third-Party Sites”). You agree to hold harmless and release the PICE, its shareholders, subsidiaries, affiliates, officers, directors, employees, and representatives from any claims, demands, and damages of every kind and nature, known and unknown, suspected and unsuspected, disclosed and undisclosed, arising out of or in any way connected with your use of Third-Party Sites.</p>
                            </li>
                            <li>
                                <h5>General</h5>
                                <p>Headings are for reference purposes only and in no way define, limit, construe, or describe the scope or extent of each Section. Our failure to act with respect to a breach by you or other user does not waive our right to act with respect to subsequent or similar breaches. Right to indemnification and the liability incurred shall survive any termination or expiration of these Terms of Use, and your access and/or use of the Site.</p>
                            </li>
                            <li>
                                <h5>Disclaimer of Warranties</h5>
                                <p>You acknowledge and agree that you access and use the Site at your own risk. The Site is provided on an “as is” and “as available” basis, without warranties of any kind, and to the maximum extent permitted by law, the PICE, its officers, directors, employees, agents, subsidiaries, and affiliates, disclaim all warranties express or implied, including, but not limited to, the warranties of merchantability, fitness for a particular purpose, title, non-infringement and those arising from course of dealing or usage of trade. We do not warrant that you will be able to access or use the Site at the times or locations of your choosing that access or use of the Site will be uninterrupted or error-free, reliable, accurate, timely, useful, adequate, complete or suitable; that defects in the Site will be corrected; or that the Site is free of viruses or other harmful components.</p>
                                <p>We shall not be liable to you for any indirect, incidental, consequential, special, punitive, remote or other similar damages, including, but not limited to, loss of revenues, lost profits, lost data, or business interruption or other intangible losses (however such losses are qualified), arising out of or relating in any way to these Terms of Use, the access and/or use of the Site, whether based on contract, tort or any other legal theory, and whether or not the PICE has been advised of the possibility of such damages.</p>
                                <p>In the event of any problem with the Site, you agree that your sole remedy is to cease access and/or use of the Site.</p>
                                <p>You agree to defend, indemnify, and hold the PICE, its officers, employees, agents, partners, and licensors harmless from any losses, costs, liabilities, claims, causes of action, and expenses (including reasonable attorneys’ fees) relating to or arising out of, directly or indirectly: (a) your access to and use of, or inability to access or use, the Site; (b) your violation of these Terms of Use; (c) your violation of any rights of a third party, including any user of the Site; or (d) your violation of any applicable laws, rules, or regulations. The PICE reserves the right, at its own cost, to assume the exclusive defense and control of any matter otherwise subject to indemnification by you, in which event you will fully cooperate with the PICE in asserting any available defenses. You agree that the provisions in this Section will survive the termination of these Terms of Use, or your access to or use of the Site.</p>
                            </li>
                            <li>
                                <h5>Assignment</h5>
                                <p>You acknowledge and agree that the PICE may assign its rights and obligations under these Terms of Use without notice to you. You shall not assign your rights and obligations under these Terms of Use without the prior written consent of the PICE (such consent may be withheld or conditioned, at our sole discretion). Any assignment without our prior written consent shall be null and void and of no effect.</p>
                            </li>
                            <li>
                                <h5>Dispute Resolution and Governing Law</h5>
                                <p>These Terms of Use shall be governed by and construed in accordance with the laws of the Philippines without reference to conflict of laws principles, and disputes arising in relation hereto shall be subject to the exclusive jurisdiction of the proper courts of Quezon City, Philippines.</p>
                                <p>You agree that we may elect to resolve the dispute in a cost-effective manner through arbitration in Quezon City, Philippines under the rules of the Philippine Dispute Resolution Center. Any arbitration award shall be final and binding upon the parties and may be enforced by judgment of a competent court having jurisdiction.</p>
                            </li>
                            <li>
                                <h5>Entire Agreement and Severability</h5>
                                <p>These Terms of Use shall constitute the entire agreement between you and the PICE concerning the Site. If any provision of these Terms of Use is deemed invalid by a court of competent jurisdiction, the invalidity of such provision shall not affect the validity of the remaining provisions of these Terms of Use, which shall remain in full force and effect.</p>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
