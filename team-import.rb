#!/usr/bin/env ruby

require 'json'

data = { south: {}, west: {}, east: {}, midwest: {} }

data.keys.each do |key|
  File.foreach("import/#{key.to_s}.txt") do |line|
    vals = line.split(' ', 2)
    data[key][vals[0].to_i] = vals[1].strip
  end
end

IO.write('./src/data/teams.json', data.to_json);
