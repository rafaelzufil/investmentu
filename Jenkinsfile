pipeline {
    agent any
    options {
        buildDiscarder(logRotator(numToKeepStr: '10', artifactNumToKeepStr: '5'))
    }

    environment {
        SITE_URL = """${sh(
            returnStdout: true,
            script: 'grep MAKE_ENV_SITE_URL ./make_env'
        )}"""
        DEV_SITE_URL = """${sh(
            returnStdout: true,
            script: 'grep MAKE_ENV_DEV_SITE_URL ./make_env'
        )}"""
    }

    stages {
        stage('Sanity Check') { steps { sh 'printenv' } }
        stage('Initialization') {
            steps {
                sh 'touch .env'
                sh 'make init'
            }
        }
        stage('Verify Installation') { steps { sh 'make verify' } }
        stage('Build') { steps { sh 'make build' } }
        stage('Deploy to STAGING') {
            when { not { anyOf { branch 'master'; branch 'release/*' } } }
            steps { sh 'make deploy' }
        }
        stage('Deploy to PRODUCTION') {
            when { branch 'master' }
            steps { sh 'make deploy' }
        }
        stage('Test') { steps { sh 'make test' } }
        stage('Test (FAIL)') { steps { sh 'make failuremode_test' } }
        stage('End') { steps { echo 'Pipeline complete.' } }
    }
    post {
        cleanup {
            // Cleanup
            cleanWs()
            deleteDir()
        }
        success {
            echo 'This will run only if successful'
            notifyBuild("SUCCESS")
            sh 'make clean'
        }
        failure {
            echo 'This will run only if failed'
            notifyBuild("FAILURE")
            sh 'make rollback'
        }
        unstable {
            echo 'This will run only if the run was marked as unstable'
            notifyBuild("UNSTABLE")
        }
        changed {
            echo 'This will run only if the state of the Pipeline has changed'
            echo 'For example, if the Pipeline was previously failing but is now successful'
        }
    }
}

def notifyBuild(String buildStatus = 'UNSTABLE') {
    // build status of null means successful
    buildStatus =  buildStatus ?: 'UNSTABLE'

    // Default values
    def colorName = 'RED'
    def colorCode = '#ff0202'
    def emoji = ':alarm:'
    def target_channel = '#jenkins'
    def giturl = "${env.GIT_URL}".replace(".git", "") << "/tree/${env.GIT_BRANCH}"
    def build_time = "${currentBuild.durationString}".replace(" and counting", "")
    def site_url = "${SITE_URL}".replace("MAKE_ENV_SITE_URL", "").replace(" ", "").replace("=", "")
    def dev_site_url = "${DEV_SITE_URL}".replace("MAKE_ENV_DEV_SITE_URL", "").replace(" ", "").replace("=", "")
    def branch_name = "${env.BRANCH_NAME}"

    if (branch_name != "master") {
        site_url = "dev." << "${site_url}"
        if (dev_site_url != "") {
            site_url = dev_site_url
        }
    }

    // Override default values based on build status
    if (buildStatus == 'UNSTABLE') {
        color = 'YELLOW'
        colorCode = '#ffcc00'
        emoji = ':thunder-cloud-and-rain:'
    } else if (buildStatus == 'SUCCESS') {
        color = 'GREEN'
        colorCode = '#aaff0e'
        emoji = ':koolaid:'
    } else {
        color = 'RED'
        colorCode = '#ff0202'
        emoji = ':alarm:'
        target_channel = '#jenkins, #dev-ops-team'
    }

    def subject = "${emoji}  [build ${env.BUILD_NUMBER}] *${buildStatus}*\n\n${site_url}\n"
    def summary = "${subject} Git:\n${giturl}\nJenkins (Blue Ocean):\n${env.RUN_DISPLAY_URL}\n\n>build time: ${build_time}"

    // Send notification
    slackSend (
        baseUrl: 'https://oxfordfinancialgroup.slack.com/services/hooks/jenkins-ci/',
        teamDomain: 'oxfordfinancialgroup',
        channel: target_channel,
        botUser: true,
        tokenCredentialId: 'creds_20191002T1500',
        color: colorCode,
        message: summary
    )
}