#### releasinator config ####
configatron.product_name = "PayPal-PHP-SDK"

# List of items to confirm from the person releasing.  Required, but empty list is ok.
configatron.prerelease_checklist_items = [
  "Sanity check the master branch."
]

def validate_version_match()
  if constant_version() != @current_release.version
    Printer.fail("lib/PayPal/Core/PayPalConstants.php version #{constant_version} does not match changelog version #{@current_release.version}.")
    abort()
  end
  Printer.success("Plugin.xml version #{constant_version} matches latest changelog version.")
end

def validate_tests()
   CommandProcessor.command("vendor/bin/phpunit", live_output=true)
   CommandProcessor.command("vendor/bin/phpunit -c phpunit.integration.xml", live_output=true)
end

configatron.custom_validation_methods = [
  method(:validate_version_match),
  method(:validate_tests)
]

# there are no separate build steps for card.io-Cordova-Plugin, so it is just empty method
def build_method
end

# The command that builds the sdk.  Required.
configatron.build_method = method(:build_method)

def publish_to_package_manager(version)
  CommandProcessor.command("npm publish .")
end

# The method that publishes the sdk to the package manager.  Required.
configatron.publish_to_package_manager_method = method(:publish_to_package_manager)


def wait_for_package_manager(version)
  CommandProcessor.wait_for("wget -U \"non-empty-user-agent\" -qO- https://www.npmjs.com/package/card.io.cordova.mobilesdk | grep #{@current_release.version} | cat")
end

# The method that waits for the package manager to be done.  Required
configatron.wait_for_package_manager_method = method(:wait_for_package_manager)

# Whether to publish the root repo to GitHub.  Required.
configatron.release_to_github = true

def constant_version()
  f=File.open("lib/PayPal/Core/PayPalConstants.php", 'r') do |f|
    f.each_line do |line|
      if line.match (/SDK_VERSION = \'\d*\.\d*\.\d*\'/) # SDK_VERSION = '1.7.1'
        return line.strip.split('= ')[1].strip.split('\'')[1]
      end
    end
  end
end
