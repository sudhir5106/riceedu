<?php include('config.php'); 
include('header.php'); 

?>
<!-- Back to Top Script-->
<script>
	jQuery(document).ready(function() {
		var offset = 220;
		var duration = 500;
		jQuery(window).scroll(function() {
			if (jQuery(this).scrollTop() > offset) {
				jQuery('.back-to-top').fadeIn(duration);
			} else {
				jQuery('.back-to-top').fadeOut(duration);
			}
		});
		
		jQuery('.back-to-top').click(function(event) {
			event.preventDefault();
			jQuery('html, body').animate({scrollTop: 0}, duration);
			return false;
		});
		
		
		jQuery('#objective').click(function() {
			$("body").scrollTop($(".objective").offset().top);
		});
		jQuery('#bg').click(function() {
			$("body").scrollTop($(".bg-cont").offset().top);
		});
		jQuery('#keyFea').click(function() {
			$("body").scrollTop($(".keyFea").offset().top);
		});
		jQuery('#strategy').click(function() {
			$("body").scrollTop($(".strategy").offset().top);
		});
		jQuery('#process').click(function() {
			$("body").scrollTop($(".process").offset().top);
		});
		jQuery('#annexure1').click(function() {
			$("body").scrollTop($(".annexure1").offset().top);
		});
		jQuery('#annexure2').click(function() {
			$("body").scrollTop($(".annexure2").offset().top);
		});
		
		
	});
</script>
<!-- eof Back to Top Script-->


        <!--eof header ** homeMid starts from here-->
        <div class="container homeMid">
        	<div>
            	<div class="left-sidebar col-sm-3">
                	<div class="left-block">
                    	<ul>
                        	<li><i class="glyphicon glyphicon-share-alt"></i> <a id="objective">Objectives</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="bg">Background</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="keyFea">Key Features</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="strategy">Strategy &amp; Approach</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="process">Process for availing the benefits of the Scheme</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="annexure1">Annexure 1</a></li>
                            <li><i class="glyphicon glyphicon-share-alt"></i> <a id="annexure2">Annexure II</a></li>
                        </ul>
                    </div>
                </div>
                <div class="page-content col-sm-9">
                	<h1>About NSDC STAR SCHEME</h1>
                    <p><strong>SDMS Online is NSDC training provider under STAR Scheme.</strong></p>
                    
                    <div class="heading objective">1. Objectives</div>
                    <p>The objective of this Scheme is to encourage skill development for youth by providing monetary rewards for successful completion of approved training programs. Specifically, the Scheme aims to:</p>
                    <ul class="simplelist">
                        <li>Encourage standardization in the certification process and initiate a process of creating a registry of skills.</li>
                        <li>Increase productivity of the existing workforce and align the training and certification to the needs of the country.</li>
                        <li>Provide Monetary Awards for Skill Certification to boost employability and productivity of youth by incentivizing them for skill trainings</li>
                        <li>Reward candidates undergoing skill training by authorized institutions at an average monetary reward of Rs. 10,000 (Rupees Ten Thousand) per candidate.</li>
                        <li>Benefit 10 lakh youth at an approximate total cost of Rs. 1,000 Crores.</li>
                    </ul>
                    
                    <div class="heading bg-cont">2. Background</div>
                    <p>The Finance Minister in his Budget Speech of 2013 proposed a scheme to encourage skill development for youth by providing monetary rewards for successful completion of approved training programs. Excerpts from the Finance Minister's speech are presented below:</p>
                    
                    <div class="heading keyFea">3. Key Features</div>
                    <p>The broad contours of the Scheme are given as below:</p>
                    <ul class="simplelist">
                        <li>This Scheme shall be implemented through Public-Private and Public-Public partnerships.</li>
                        <li>Definitions of terms and expansions of acronyms used in this document are listed in <strong>Annexure 1</strong>.</li>
                        <li>NSDC will be the implementing agency for this Scheme.</li>
                        <li>National Skill Development Fund (NSDF) Trust shall monitor the implementation of the Scheme, using mutually agreed criteria with NSDC.</li>
                        <li>The Scheme will provide monetary incentives for successful completion of, market-driven skill training to approximately ten lakh youth in in a span of one year from the date of implementation of the scheme.</li>
                        <li>All trainings will be specifically oriented for developing skills in specific growth sectors.</li>
                        <li>Assessment and training bodies for all purposes of the Scheme will be separate and no overlap of roles will be allowed to maintain transparency and objectivity.</li>
                        <li>The monetary reward will be wholly funded by the Ministry of Finance, Government of India, and will be affected through direct bank transfer to the beneficiaries' accounts. For facilitating the smooth disbursement as prescribed under the scheme, the entire money along with the additional implementation fund will be transferred to National Skill Development Fund for further utilization by NSDC.</li>
                        <li>Appropriate consideration will be provided to the economically backward sections.</li>
                    </ul>
                    <div class="heading strategy">4. Strategy &amp; Approach</div>
                    <p><strong>4.1 Eligible Sectors and Job Roles</strong></p>
                    <ol class="alpha">
                        <li>While the Scheme is intended to cover all job roles in all sectors, it will initially cover only a limited number of high-market-demand Job Roles in specified economic sectors from Levels 1 to 4 in the NSQF.</li>
                        <li>National Occupational Standards (NOSs) and Qualification Packs (QPs) for these roles will be prepared by the respective SSCs, and will constitute 80% of the entry-level workforce in priority sectors.</li>
                    </ol>
                    <p><strong>4.2 Training Content and Eligible Providers</strong></p>
                    <ol class="alpha">
                        <li>To ensure that benefit is extended only to the trainees taking courses which are aligned to NOSs and QPs for eligible Sectors and Job Roles, a select list of training institutions to offer these courses will be approved for the purposes of this Scheme.</li>
                        <li>All institutions, government or private (who, during the last two years, have been selected by any State Government or any Ministry of the Government of India to implement any Government funded or sponsored Scheme), or are NSDC partners, shall be deemed to be part of the approved list of training providers under this Scheme. All such deemed approved training providers will need to get each training course they propose to offer, aligned to NOS and QPs of various eligible job roles corresponding to Levels 1 to 4 as designed by SSCs.</li>
                        <li>Those training providers, who have no prior affiliation with any government institution or NSDC, will go through a pre-screening process of the SSCs according to an Affiliation Protocol prepared by NSDC/SSC.</li>
                        <li>The willingness of a training provider to permit trainees to pay part of their fees after the monetary reward has been received, shall be considered while approval is granted for such training provider to be part of the Scheme.</li>
                        <li>No fees shall be charged by the SSCs for the approval process of training providers at Para 4.2 (b) above, for each Courseware aligned to a job role. Charges will be applicable only for training of trainers and their assessments. The fees to be charged by SSCs for the training providers as at para 4.2(c) will be determined in due course.</li>
                        <li>The list of all the training providers in the skill development space that have been associated with any government institution shall be available on the NSDA website.</li>
                        <li>The list of all the training providers in the skill development space that are NSDC partners, and those that are pre-screened as per Para 4.2 (c) above shall be available on the NSDC website in addition to the QPs, NOS, Approved Sectors and Job Roles.</li>
                        <li>Training programs will be for a minimum of 30 days duration and will include training on social skills like health, hygiene, communication skills etc. It will be ensured that assessments are planned by SSCs only after completion of the training. The duration of training may also include On the Job training, Internships etc. if required.</li>
                    </ol>
                    <p><strong>4.3 Assessment and Certification</strong></p>
                    <ol class="alpha">
                        <li>No entity that is engaged in providing training under this Scheme shall be eligible to be approved as an assessment and certification agency.</li>
                        <li>All assessment agencies will be pre-screened and approved by the SSCs and their details updated on the SDMS.</li>
                        <li>Initially a select set of assessment agencies with national presence, selected as assessment agencies with Central/State Govt. and having demonstrated ability to assess the eligible training content w.r.t NOS and QPs, will be selected by SSCs. Later the Scheme would be made open to all eligible assessment agencies.</li>
                        <li>In due course, any institution or body offering assessment services can apply to work with specific SSCs, for designated NOS and QPs for eligible sectors and job roles.</li>
                        <li>All assessments will conform to assessment guidelines laid down by the concerned SSC for each QP. Any candidate can undergo assessment any number of times for qualifying for a particular job role, at any approved assessment agency. A candidate has to undergo formal training as a prerequisite for assessment.</li>
                        <li>Assessment Fees charged to candidates for each assessment will be capped as follows:
                            <ol>
                                <li>Courses aligned to shop floor job roles in manufacturing – maximum Rs. 1,500</li>
                                <li>All other Courses – maximum Rs. 1,000</li>
                            </ol>
                        </li>
                        <li>Maximum Registration and approval fees to be charged by the SSCs for the approval process of assessment agencies are available in <strong>Annexure II</strong>.</li>
                    </ol>
                    <p><strong>4.4 Eligible Beneficiaries</strong><br />
                        In line with the objectives stated above, this Scheme is applicable to any candidate of Indian nationality who:
                    </p>
                    <ol class="alpha">
                        <li>undergoes a skill development training in an eligible sector by an eligible training provider as defined above;</li>
                        <li>is certified during the span of one year from the date of launch of the scheme by approved assessment agencies as defined above;</li>
                        <li>is availing of this monetary award for the first and only time during the operation of this Scheme.</li>
                    </ol>
                    <p>The Scheme is currently meant only for candidates availing themselves of skill development trainings from eligible providers.</p><br /><br />
                    <p><strong>4.5 Monetary Awards</strong></p>
                    <ol class="alpha">
                        <li>The banking network will be used for direct transfer of the funds to the candidates / training provider. The reward corpus will be placed with a nodal bank in each District in consultation with the Indian Banks Association that will then create a consortium to ensure disbursement of the amount into the account of the beneficiary/ies. Details of such Banks in each district would be given wide publicity on relevant websites.</li>
                        <li>Monetary Award for Certification is as follows:</li>
                    </ol>
                    <table align="center" class="table table-hover">
                        <thead>
                            <tr class="success">
                                <th>Sectors</th>
                                <th>NSQF Levels 1 &amp; 2</th>
                                <th>NSQF Levels 3 &amp; 4</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Manufacturing Courses</td>
                                <td>Rs. 10,000</td>
                                <td>Rs. 15,000</td>
                            </tr>
                            <tr>
                                <td>Service &amp; Other Sectors</td>
                                <td>Rs. 7500</td>
                                <td>Rs. 10,000</td>
                            </tr>
                        </tbody>
                    </table>
                    <ol class="alpha" type="c" start="3">
                        <li>Each category would have pre-defined number of awards. The numbers for each category will be decided by NSDA in consultation with NSDC.</li>
                        <li>In order to enable the financially disadvantaged to use the reward money to fund a part of the training cost, the training providers will allow candidates to pay some amount of the course fee after receipt of the monetary reward. At the time of the enrollment for the course, the trainee will have to pay some part of the course fee (to be decided separately), so that the candidate has a sustained interest in the completion of the course.</li>
                        <li>A Complaints / Grievance cell for this Scheme would be set up which shall include representatives of the SSCs, the NSDC and the NSDA. The first level of redress would be the Governing Council of the relevant SSC and a second level would be the NSDA.</li>
                    </ol>
                    <p><strong>4.6 Evaluation and Monitoring</strong></p>
                    <ol class="alpha">
                        <li>Skill Development System (SDMS) will have the central repository of data which can be utilized by various stake holders to monitor this Scheme.</li>
                        <li>All agencies, like SSCs, training institutions, assessment agencies etc. will have access to SDMS to maintain a central repository of training data.</li>
                        <li>Independent evaluation of the Scheme will be done by the NSDA based on agreed criteria with NSDC.</li>
                    </ol>
                    
                    <div class="heading process">5. Process for availing the benefits of the Scheme></div>
                    <ul class="simplelist">
                        <li>The candidate can enroll in any course from the list of registered courses in specified high demand sectors. The candidate can pursue the course with any of the approved training providers.</li>
                        <li>The candidate needs to intimate the training providers that he/she intends to participate in the Scheme. The details of the student shall then be entered in to the SDMS database along with the UID/NPR number (if neither is available, the mobile number of the candidate), and contact details. The training provider will facilitate the enrolment of the candidate in UIDAI/NPR Scheme and update the mobile number with the UID/NPR number.</li>
                        <li>Candidates from economically disadvantaged sections will be allowed to pay initial fees equal to the difference between the training cost and the reward money they are eligible for. In such cases the candidate can authorize payment of the reward money to be directly transferred to the training provider after the candidate successfully passes the assessment. Bank account details of such candidates shall be mandatorily taken at the time of registration, or at the time of opening of account.</li>
                        <li>After completion of the training, the candidate may get assessed by any of the approved assessment agencies as specified in 4.3 above.</li>
                        <li>The details of the assessments are captured on SDMS and forwarded to the concerned SSC electronically.</li>
                        <li>The assessment agency, in association with SSCs, will award a secure certificate with a QR bar code for successful completion and assessment of a course through the SDMS. The certificate will be electronically verified using a CAM device and linked to UID/NPR number of the candidate.</li>
                        <li>If the candidate has successfully completed a course which is already being certified by agencies other than SSCs in the existing market scenario, such as universities, school boards, NCVT, SCVT, internationally recognized certification agencies etc., SSCs shall work with these institutions for reward of dual certification for the course.</li>
                        <li>The certification fees shall be paid by the candidate to the assessment agencies as defined in 4.3 (f) above.</li>
                        <li>The award and issue of the certificate will be captured in SDMS.</li>
                        <li>After successfully meeting all eligibility criteria as specified in 4.4 above, the candidate shall be eligible for the monetary reward.</li>
                        <li>After verification of the secure certificate by the approved training provider and updation of SDMS, NSDC will instruct the bank to credit the candidate's bank account directly. Alternately the award money may also be paid as A/C payee bank draft in the name of the beneficiary.</li>
                        <li>Where the fees have been paid in part, the training provider will be paid by NSDC through a direct bank transfer.</li>
                        <li>Once the monetary reward is given under the Scheme and the candidates record has been updated on SDMS, no further payment will be made using the secure certificate.</li>
                    </ul>
                    
                    <div class="heading annexure1">Annexure 1</div>
                    <ol class="alpha">
                        <li><strong>NSDA</strong> – The National Skill Development Agency (NSDA) is an autonomous body, constituted by the Government of India and subsumes the erstwhile National Council on Skill Development (PMNCSD), the National Skill Development Coordination Board (NSDCB) and the Office of the Adviser to PM on Skill Development (OAPM). The NSDA will anchor the National Skills Qualifications Framework (NSQF) and will facilitate the setting up of professional certifying bodies in addition to the existing ones.</li>
                        <li><strong>NSDC</strong> – The National Skill Development Corporation (NSDC) has been instituted to foster private sector initiatives in skill development. It is a Private Public Partnership (PPP) organization with representatives of Government and Industry Associations on its Board.</li>
                        <li><strong>SSCs</strong> – Sector Skill Councils (SSCs) are industry-led bodies, who would be responsible for the defining the skilling needs, concept, processes, certification, accreditation of their respective industry sectors. The SSCs shall prescribe the NOSs and QPs for the job roles relevant to their industry, and shall work with the NSDA to ensure that these are in accordance with the NSQF.</li>
                        <li><strong>NSQF</strong> – The National Skill Qualification Framework (NSQF), would be a descriptive framework that organizes qualifications according to a series of levels of knowledge, skills and aptitude. These levels are defined in terms of learning outcomes i.e., the competencies which the learners must possess regardless of whether they were acquired through formal, non-formal or informal education and training. It is, therefore, a nationally integrated education and competency based skill framework that will provide for multiple pathways both within vocational education and vocational training and among vocational education, vocational training, general education and technical education, thus linking one level of learning to another higher level to enable a person to acquire desired skill levels, transit to the job market and return to skill development to further upgrade their skill sets.</li>
                        <li><strong>NOSs</strong> – National Occupational Standards (NOSs) specify the standard of performance an individual must achieve when carrying out a particular activity in the workplace, together with the knowledge and understanding they need to meet that standard consistently. Each NOS defines one key function in a job role. In their essential form, NOSs describe functions, standards of performance and knowledge/understanding.</li>
                        <li><strong>QPs</strong> – A set of NOSs, aligned to a job role, called Qualification Packs (QPs), would be available for every job role in each industry sector. These drive both the creation of curriculum, and assessments. These job roles would be at various proficiency levels, and aligned to the NSQF.NOSs and QPs for job roles in various industry sectors, created by SSCs and subsequently ratified by appropriate authority, would be available online and updated from time to time.</li>
                        <li><strong>SDMS</strong> – The Skill Development Management System (SDMS) has been developed and maintained by the NSDC.</li>
                    </ol>
                    
                    <div class="heading annexure2">Annexure II</div>
                    <p><strong>Maximum Registration and Approval Fees to Be Charged by SSCs to Assessment Agencies</strong></p>
                    <table align="center" class="table table-hover table-bordered">
                        <thead>
                            <tr class="success">
                                <th>S.No</th>
                                <th>Cost Head</th>
                                <th>Cost (Rs)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td align="center">1.</td>
                                <td><strong>Visit by SSC Team to Assessment Agency</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>(a) Application Fees – One Time</td>
                                <td>10,000</td>
                            </tr>
                                <td></td>
                                <td>(b) Visit Fee for spread over two to three days - Annual
                                    <ul class="simplelist">
                                        <li>Compliance Check</li>
                                        <li>Document Checks</li>
                                        <li>Alignment check to database and test of reporting runs</li>
                                    </ul>
                                </td>
                                <td>40,000</td>
                            </tr>
                            </tr>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><strong>50,000</strong></td>
                            </tr>
                            </tr>
                                <td align="center">2.</td>
                                <td><strong>Train the Assessor Fee per candidate/ Course</strong></td>
                                <td><strong>10,000</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!--eof homeMid ** footer starts from here-->
        <a href="#" class="back-to-top">&nbsp;</a>
<?php include('footer.php'); ?>